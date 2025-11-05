<?php

namespace App\Livewire\Admin\Cars;

use App\Models\Car;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';


    #[Computed]
    public array $selected_items = [];

    public bool $selectAll = false;

    public int $carsWithoutRegionCount = 0;

    protected string $paginationTheme = 'bootstrap';

    public array $commission_rate = [];

    public $opened = null;

    public function render()
    {
        $data = $this->getPaginate();

        $this->carsWithoutRegionCount = $data->where('region_id', null)->count();

        return view('livewire.admin.cars.index',[
            'data' => $data,
        ]);
    }

    public function toggleAvailable($itemId)
    {
        $item = Car::findOrFail($itemId);
        $item->update([
            'is_available' => !$item->is_available,
        ]);
        $this->js("NioApp.Toast('Status updated successfully', 'success', {
                                position: 'top-right'
                            });");
    }

    protected function getData()
    {
        $data = $this->getPaginate();

        return $data;
    }

    public function updatedSelectAll()
    {
        if ($this->selectAll) {
           $this->selected_items = $this->getData()->pluck('id')->map(fn($id) => (string) $id)->toArray();
        } else {
            $this->selected_items = [];
        }
    }

    public function deleteSelectedItems()
    {
        Car::whereIn('id', $this->selected_items)->delete();
        $this->selected_items = [];
    }
    public function resetPageData()
    {
        $this->search = '';
        $this->resetPage();
    }


    protected function getPaginate(): \Illuminate\Contracts\Pagination\LengthAwarePaginator|array
    {
        $query = Car::with('availabilities','blackouts','company')->latest();

        if (!isOwner() && !isAdmin()) {
            return [];
        }

        if (!isAdmin()) {
            $query->where('company_id', companyId());
        }

        $query->where(function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('make', 'like', '%' . $this->search . '%')
                ->orWhere('model', 'like', '%' . $this->search . '%');
        });

        return $query->paginate(10);
    }

    public function toggleApproved($itemId)
    {
        $this->opened = ($this->opened == $itemId) ? null : $itemId;
    }

    public function updateCommissionRate($itemId, $commissionRate)
    {
        $this->commission_rate[$itemId] = $commissionRate;
    }

    public function applyApproval($itemId, $status)
    {
        if($status == 1 && !isset($this->commission_rate[$itemId])) {
            $this->js("NioApp.Toast('Please enter commission', 'warning', {
                position: 'top-right'
            });");
            return;
        }

        $item = Car::findOrFail($itemId);

        $item->update([
            'is_approved' => $status,
            'commission_fee' => isset($this->commission_rate[$itemId]) ? $this->commission_rate[$itemId] : 0,
        ]);
        
        $item->availabilities()->where('status', '0')->update(['status' => '1']);
        $item->blackouts()->where('status', '0')->update(['status' => '1']);
        
        $items = $item->dynamic_pricings;
        foreach($items as $index => &$item0){
            if(!isset($item0['status'])){
                $item0['status'] = $status;
            }
        }
        $item->dynamic_pricings = $items;
        $item->save();
        
        $this->js("NioApp.Toast('Status updated successfully', 'success', {
            position: 'top-right'
        });");
    }
    
    public function applyApprovalSub($type, $itemId, $subItem, $status){
        $item0 = Car::findOrFail($itemId);
        
        if($type == 'availability'){
            $item0->availabilities()->where('id', $subItem)->update(['status' => $status]);
        } else if($type == 'blackout'){
            $item0->blackouts()->where('id', $subItem)->update(['status' => $status]);
        } else if($type == 'dpricing') {
            $items = $item0->dynamic_pricings;
            foreach($items as $index => &$item){
                if($index == $subItem){
                    $item['status'] = $status;
                }
            }
            $item0->dynamic_pricings = $items;
            $item0->save();
        }
    }
}
