@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection

@section('content')
    <h1>Rate This Project</h1>

    <form method='POST' action='/projects'>
        {{ csrf_field() }}

        <label for="existing_donor">:</label>
        <input type="range" id="existing_donor" name="existing_donor" min="1" max="5">

        <label for="donor_area">:</label>
        <input type="range" id="donor_area" name="donor_area" min="1" max="5">

        <label for="foundation_timing">:</label>
        <input type="range" id="foundation_timing" name="foundation_timing" min="1" max="5">

        <label for="strategic_plan">:</label>
        <input type="range" id="strategic_plan" name="strategic_plan" min="1" max="5">

        <label for="campus_plan">:</label>
        <input type="range" id="campus_plan" name="campus_plan" min="1" max="5">

        <label for="campaign_priority">:</label>
        <input type="range" id="campaign_priority" name="campaign_priority" min="1" max="5">

        <label for="program_impact">:</label>
        <input type="range" id="program_impact" name="program_impact" min="1" max="5">

        <label for="legal_obligation">:</label>
        <input type="range" id="legal_obligation" name="legal_obligation" min="1" max="5">

        <label for="fund_obligation">:</label>
        <input type="range" id="fund_obligation" name="fund_obligation" min="1" max="5">

        <label for="completes_cert">:</label>
        <input type="range" id="completes_cert" name="completes_cert" min="1" max="5">

        <label for="support">:</label>
        <input type="range" id="support" name="support" min="1" max="5">

        <label for="grant">:</label>
        <input type="range" id="grant" name="grant" min="1" max="5">

        <label for="historic_credit">:</label>
        <input type="range" id="historic_credit" name="historic_credit" min="1" max="5">

        <label for="visitation_revenue">:</label>
        <input type="range" id="visitation_revenue" name="visitation_revenue" min="1" max="5">

        <label for="audience_expansion">:</label>
        <input type="range" id="audience_expansion" name="audience_expansion" min="1" max="5">

        <label for="special_ticket">:</label>
        <input type="range" id="special_ticket" name="special_ticket" min="1" max="5">

        <label for="other_potential">:</label>
        <input type="range" id="other_potential" name="other_potential" min="1" max="5">

        <label for="deai_staff">:</label>
        <input type="range" id="deai_staff" name="deai_staff" min="1" max="5">

        <label for="interpretation">:</label>
        <input type="range" id="interpretation" name="interpretation" min="1" max="5">

        <label for="includes_race">:</label>
        <input type="range" id="includes_race" name="includes_race" min="1" max="5">

        <label for="includes_gender">:</label>
        <input type="range" id="includes_gender" name="includes_gender" min="1" max="5">

        <label for="includes_sexuality">:</label>
        <input type="range" id="includes_sexuality" name="includes_sexuality" min="1" max="5">

        <label for="includes_physical">:</label>
        <input type="range" id="includes_physical" name="includes_physical" min="1" max="5">

        <label for="includes_psychiatric">:</label>
        <input type="range" id="includes_psychiatric" name="includes_psychiatric" min="1" max="5">

        <label for="primary_representation">:</label>
        <input type="range" id="primary_representation" name="primary_representation" min="1" max="5">

        <label for="secondary_representation 	">:</label>
        <input type="range" id="secondary_representation 	" name="secondary_representation 	" min="1"
            max="5">

        <label for="diverse_audience 	">:</label>
        <input type="range" id="diverse_audience 	" name="diverse_audience 	" min="1" max="5">

        <label for="diverse_support 	">:</label>
        <input type="range" id="diverse_support 	" name="diverse_support 	" min="1" max="5">

        <label for="diverse_vendor">:</label>
        <input type="range" id="diverse_vendor" name="diverse_vendor" min="1" max="5">

        <label for="curatorial_staff">:</label>
        <input type="range" id="curatorial_staff" name="curatorial_staff" min="1" max="5">

        <label for="tech">:</label>
        <input type="range" id="tech" name="tech" min="1" max="5">

        <label for="community">:</label>
        <input type="range" id="community" name="community" min="1" max="5">

        <label for="academic">:</label>
        <input type="range" id="academic" name="academic" min="1" max="5">

        <label for="permanent_collection">:</label>
        <input type="range" id="permanent_collection" name="permanent_collection" min="1" max="5">

        <label for="new_donors">:</label>
        <input type="range" id="new_donors" name="new_donors" min="1" max="5">

        <label for="visitor_experience">:</label>
        <input type="range" id="visitor_experience" name="visitor_experience" min="1" max="5">

        <label for="collection_strength">:</label>
        <input type="range" id="collection_strength" name="collection_strength" min="1" max="5">

        <label for="storage_turnover">:</label>
        <input type="range" id="storage_turnover" name="storage_turnover" min="1" max="5">

        <label for="conservation_opportunity">:</label>
        <input type="range" id="conservation_opportunity" name="conservation_opportunity" min="1"
            max="5">

        <label for="interpretive_update">:</label>
        <input type="range" id="interpretive_update" name="interpretive_update" min="1" max="5">

        <label for="enhance_display">:</label>
        <input type="range" id="enhance_display" name="enhance_display" min="1" max="5">

        <label for="steward">:</label>
        <input type="range" id="steward" name="steward" min="1" max="5">

        <label for="code_law_regulation">:</label>
        <input type="range" id="code_law_regulation" name="code_law_regulation" min="1" max="5">

        <label for="art_environment">:</label>
        <input type="range" id="art_environment" name="art_environment" min="1" max="5">

        <label for="hvac_art">:</label>
        <input type="range" id="hvac_art" name="hvac_art" min="1" max="5">

        <label for="hvac_nonart">:</label>
        <input type="range" id="hvac_nonart" name="hvac_nonart" min="1" max="5">

        <label for="service_improvement">:</label>
        <input type="range" id="service_improvement" name="service_improvement" min="1" max="5">

        <label for="efficient_process">:</label>
        <input type="range" id="efficient_process" name="efficient_process" min="1" max="5">

        <label for="public_aesthetics">:</label>
        <input type="range" id="public_aesthetics" name="public_aesthetics" min="1" max="5">

        <label for="nonpublic_aesthetics">:</label>
        <input type="range" id="nonpublic_aesthetics" name="nonpublic_aesthetics" min="1" max="5">

        <label for="education_staff">:</label>
        <input type="range" id="education_staff" name="education_staff" min="1" max="5">

        <label for="visitation">:</label>
        <input type="range" id="visitation" name="visitation" min="1" max="5">

        <label for="program_enhancement">:</label>
        <input type="range" id="program_enhancement" name="program_enhancement" min="1" max="5">

        <label for="curricular_connection">:</label>
        <input type="range" id="curricular_connection" name="curricular_connection" min="1" max="5">

        <label for="programming_space">:</label>
        <input type="range" id="programming_space" name="programming_space" min="1" max="5">

        <label for="augmentation">:</label>
        <input type="range" id="augmentation" name="augmentation" min="1" max="5">

        <label for="families">:</label>
        <input type="range" id="families" name="families" min="1" max="5">

        <label for="accessible">:</label>
        <input type="range" id="accessible" name="accessible" min="1" max="5">

        <label for="way_finding">:</label>
        <input type="range" id="way_finding" name="way_finding" min="1" max="5">

        <label for="view_variety">:</label>
        <input type="range" id="view_variety" name="view_variety" min="1" max="5">

        <label for="existing_community">:</label>
        <input type="range" id="existing_community" name="existing_community" min="1" max="5">

        <label for="new_community">:</label>
        <input type="range" id="new_community" name="new_community" min="1" max="5">

        <label for="education_market">:</label>
        <input type="range" id="education_market" name="education_market" min="1" max="5">

        <label for="deai_initiatives">:</label>
        <input type="range" id="deai_initiatives" name="deai_initiatives" min="1" max="5">

        <label for="storage_capacity">:</label>
        <input type="range" id="storage_capacity" name="storage_capacity" min="1" max="5">

        <label for="collections_access">:</label>
        <input type="range" id="collections_access" name="collections_access" min="1" max="5">

        <label for="site_storage">:</label>
        <input type="range" id="site_storage" name="site_storage" min="1" max="5">

        <label for="swing_space">:</label>
        <input type="range" id="swing_space" name="swing_space" min="1" max="5">

        <label for="add_storage">:</label>
        <input type="range" id="add_storage" name="add_storage" min="1" max="5">

        <label for="positive_impact">:</label>
        <input type="range" id="positive_impact" name="positive_impact" min="1" max="5">

        <label for="inventory">:</label>
        <input type="range" id="inventory" name="inventory" min="1" max="5">

        <label for="av_staff">:</label>
        <input type="range" id="av_staff" name="av_staff" min="1" max="5">

        <label for="current_collection">:</label>
        <input type="range" id="current_collection" name="current_collection" min="1" max="5">

        <label for="loan_embargo">:</label>
        <input type="range" id="loan_embargo" name="loan_embargo" min="1" max="5">

        <label for="acquisitions_embargo">:</label>
        <input type="range" id="acquisitions_embargo" name="acquisitions_embargo" min="1" max="5">

        <label for="resource_conflict">:</label>
        <input type="range" id="resource_conflict" name="resource_conflict" min="1" max="5">


        <button type='submit'>Submit</button>
    </form>
@endsection
