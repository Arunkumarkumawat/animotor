<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->boolean('private_hire')->default(false);
            $table->string('licensing_authority')->nullable();
            $table->string('phv_plate_number')->nullable();
            $table->string('phv_expiry_date')->nullable();
            $table->string('hr_insurance_expiry')->nullable();
            $table->string('plate_certificate')->nullable();
            $table->string('hr_insurance_proof')->nullable();

            $table->boolean('short_term')->default(false);
            $table->boolean('long_term')->default(false);
            $table->boolean('rent_to_buy')->default(false);

            $table->string('short_term_minimum_term')->nullable();
            $table->string('short_term_maximum_term')->nullable();
            $table->string('short_term_pricing_cadence')->nullable();
            $table->string('short_term_weekly_price_wo_ins')->nullable();
            $table->string('short_term_weekly_price_w_ins')->nullable();
            $table->boolean('short_term_maintenance_included')->default(false);
            $table->string('short_term_deposit')->nullable();
            $table->string('short_term_excess_liability')->nullable();
            $table->string('short_term_early_return_fee')->nullable();
            $table->string('short_term_notice_period_to_return')->nullable();

            $table->string('long_term_billing_cycle')->nullable();
            $table->string('long_term_default_deposit')->nullable();
            $table->json('long_term_term_options')->nullable();
            $table->json('long_term_prices')->nullable();
            $table->string('long_term_excess_liability')->nullable();
            $table->boolean('long_term_vehicle_swap_allowed')->default(false);
            $table->text('long_term_early_termination_rules')->nullable();

            $table->string('rent_to_buy_term')->nullable();
            $table->string('rent_to_buy_billing_cycle')->nullable();
            $table->string('rent_to_buy_price_per_cycle')->nullable();
            $table->string('rent_to_buy_deposit_amount')->nullable();
            $table->string('rent_to_buy_balloon_payment')->nullable();
            $table->string('rent_to_buy_payment_break_weeks_year')->nullable();
            $table->string('rent_to_buy_mileage_allowance_per_cycle')->nullable();
            $table->string('rent_to_buy_excess_mileage_rate')->nullable();
            $table->boolean('rent_to_buy_insurance_included')->default(false);
            $table->boolean('rent_to_buy_maintenance_included')->default(false);
            $table->boolean('rent_to_buy_ev_incentive_included')->default(false);
            $table->text('rent_to_buy_ownership_transfer_notes')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', function (Blueprint $table) {
            foreach(['private_hire', 'licensing_authority', 'phv_plate_number', 'phv_expiry_date', 'hr_insurance_expiry', 'plate_certificate', 'hr_insurance_proof', 'short_term', 'long_term', 'rent_to_buy', 'short_term_minimum_term', 'short_term_maximum_term', 'short_term_pricing_cadence', 'short_term_weekly_price_wo_ins', 'short_term_weekly_price_w_ins', 'short_term_maintenance_included', 'short_term_deposit', 'short_term_excess_liability', 'short_term_early_return_fee', 'short_term_notice_period_to_return', 'long_term_billing_cycle', 'long_term_default_deposit', 'long_term_term_options', 'long_term_prices', 'long_term_excess_liability', 'long_term_vehicle_swap_allowed', 'long_term_early_termination_rules', 'rent_to_buy_term', 'rent_to_buy_billing_cycle', 'rent_to_buy_price_per_cycle', 'rent_to_buy_deposit_amount', 'rent_to_buy_balloon_payment', 'rent_to_buy_payment_break_weeks_year', 'rent_to_buy_mileage_allowance_per_cycle', 'rent_to_buy_excess_mileage_rate', 'rent_to_buy_insurance_included', 'rent_to_buy_maintenance_included', 'rent_to_buy_ev_incentive_included', 'rent_to_buy_ownership_transfer_notes'] as $column) {
                try { $table->dropColumn($column); } catch (\Exception $e){ /* ok */ }
            }
        });
    }
};
