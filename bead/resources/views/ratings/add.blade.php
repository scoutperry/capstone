@extends('layouts/main')


@section('head')
    {{--
Page specific CSS includes should be defined here; 
this .css file does not exist yet, but we can create it 

    <link href='/css/bead.css' rel='stylesheet'> --}}
@endsection
@section('title')
    Rate {{ $project->title }}
@endsection
@section('content')
    <h1>Rate {{ $project->title }}</h1>
    <form method='POST' action='/ratings/{{ $project->title }}/save'>
        {{ csrf_field() }}
        <br>


        @foreach ($ratings as $rating)
            <label for='{{ $rating->handle }}'>{{ $rating->measure }}:</label>
            <input type="range" id='{{ $rating->handle }}' name='{{ $rating->handle }}' min="1" max="5">
            <br>
        @endforeach

        {{-- Responsive code here
        <fieldset>
            <label for="existing_donor">This project can be funded from existing donors:</label>
            <input type="range" id="existing_donor" name="existing_donor" min="1" max="5">
            <br>

            <label for="donor_area">This project will not require building a whole new donor area (i.e.: archeology,
                contemporary
                etc.):</label>
            <input type="range" id="donor_area" name="donor_area" min="1" max="5">
            <br>

            <label for="foundation_timing">This project will either not require funding from Foundations or fits the timing
                for
                a particular foundation:</label>
            <input type="range" id="foundation_timing" name="foundation_timing" min="1" max="5">
            <br>

            <label for="strategic_plan">This project has a strong connection to the Strategic Plan:</label>
            <input type="range" id="strategic_plan" name="strategic_plan" min="1" max="5">
            <br>

            <label for="campus_plan">This project has an existing place on the Campus Master Plan:</label>
            <input type="range" id="campus_plan" name="campus_plan" min="1" max="5">
            <br>

            <label for="campaign_priority">This project is included in the Campaign priorities:</label>
            <input type="range" id="campaign_priority" name="campaign_priority" min="1" max="5">
            <br>

            <label for="program_impact">This project does not negatively impact programming (closes galleries etc., reduces
                capacity, impacts people movement etc.):</label>
            <input type="range" id="program_impact" name="program_impact" min="1" max="5">
            <br>

            <label for="legal_obligation">This project satisfies an existing legal obligation:</label>
            <input type="range" id="legal_obligation" name="legal_obligation" min="1" max="5">
            <br>

            <label for="fund_obligation">This project satisfies an existing funding based obligation:</label>
            <input type="range" id="fund_obligation" name="fund_obligation" min="1" max="5">
            <br>

            <label for="completes_cert">This project satisfies an existing Certification:</label>
            <input type="range" id="completes_cert" name="completes_cert" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="support">This project generates corporate/foundation/individual support:</label>
            <input type="range" id="support" name="support" min="1" max="5">
            <br>

            <label for="grant">This project utilizes potential grants:</label>
            <input type="range" id="grant" name="grant" min="1" max="5">
            <br>

            <label for="historic_credit">This project is eligible for a historic tax credit:</label>
            <input type="range" id="historic_credit" name="historic_credit" min="1" max="5">
            <br>

            <label for="visitation_revenue">This project increases overall visitation (Incremental admissions
                revenue):</label>
            <input type="range" id="visitation_revenue" name="visitation_revenue" min="1" max="5">
            <br>

            <label for="audience_expansion">This project generates audience expansion:</label>
            <input type="range" id="audience_expansion" name="audience_expansion" min="1" max="5">
            <br>

            <label for="special_ticket">This project supports special ticket sales:</label>
            <input type="range" id="special_ticket" name="special_ticket" min="1" max="5">
            <br>

            <label for="other_potential">This project supports special ticket sales:</label>
            <input type="range" id="other_potential" name="other_potential" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="deai_staff">This project requires additional DEAI staff:</label>
            <input type="range" id="deai_staff" name="deai_staff" min="1" max="5">
            <br>

            <label for="interpretation">This project includes bilingual interpretation:</label>
            <input type="range" id="interpretation" name="interpretation" min="1" max="5">

            <label for="includes_race">This project includes people from underrepresented races and/or ethnicities:</label>
            <input type="range" id="includes_race" name="includes_race" min="1" max="5">
            <br>

            <label for="includes_gender">This project includes people with underrepresented gender identities:</label>
            <input type="range" id="includes_gender" name="includes_gender" min="1" max="5">
            <br>

            <label for="includes_sexuality">This project includes people with underrepresented sexual identities:</label>
            <input type="range" id="includes_sexuality" name="includes_sexuality" min="1" max="5">
            <br>

            <label for="includes_physical">This project includes people with physical disabilities:</label>
            <input type="range" id="includes_physical" name="includes_physical" min="1" max="5">
            <br>

            <label for="includes_psychiatric">This project includes people with mental disabilities:</label>
            <input type="range" id="includes_psychiatric" name="includes_psychiatric" min="1" max="5">
            <br>

            <label for="primary_representation">This project includes primary interpretation (i.e., curator, content
                contributor) from one or more of the groups described above:</label>
            <input type="range" id="primary_representation" name="primary_representation" min="1"
                max="5">
            <br>

            <label for="secondary_representation">This project includes secondary interpretation (i.e., sources consulted)
                from
                one or more of the groups described above:</label>
            <input type="range" id="secondary_representation" name="secondary_representation" min="1"
                max="5">
            <br>

            <label for="diverse_audience">This project markets to one or more of the groups described above:</label>
            <input type="range" id="diverse_audience" name="diverse_audience" min="1" max="5">
            <br>

            <label for="diverse_support ">This project seeks financial support from one or more of the groups described
                above:</label>
            <input type="range" id="diverse_support" name="diverse_support" min="1" max="5">
            <br>

            <label for="diverse_vendor">This project utilizes vendors from one or more of the groups described
                above:</label>
            <input type="range" id="diverse_vendor" name="diverse_vendor" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="curatorial_staff">This project will not require additional curatorial staff:</label>
            <input type="range" id="curatorial_staff" name="curatorial_staff" min="1" max="5">
            <br>

            <label for="tech">This project will not require enhanced technology or upgrades to WAM’s technological
                infrastructure:</label>
            <input type="range" id="tech" name="tech" min="1" max="5">
            <br>

            <label for="community">This project offers opportunity to collaborate with community partners:</label>
            <input type="range" id="community" name="community" min="1" max="5">
            <br>

            <label for="academic">This project offers opportunity to collaborate with academic partners:</label>
            <input type="range" id="academic" name="academic" min="1" max="5">
            <br>

            <label for="permanent_collection">This project offers a longstanding installation for permanent collection
                objects:</label>
            <input type="range" id="permanent_collection" name="permanent_collection" min="1" max="5">
            <br>

            <label for="new_donors">This project creates opportunity to build relationships with new donors and
                collectors:</label>
            <input type="range" id="new_donors" name="new_donors" min="1" max="5">
            <br>

            <label for="visitor_experience">This project improves the overall visitor experience:</label>
            <input type="range" id="visitor_experience" name="visitor_experience" min="1" max="5">
            <br>

            <label for="collection_strength">This project improves the visibility and accessibility of a particular area of
                strength within WAM’s collection:</label>
            <input type="range" id="collection_strength" name="collection_strength" min="1" max="5">
            <br>

            <label for="storage_turnover">This project provides opportunity to bring objects out of storage:</label>
            <input type="range" id="storage_turnover" name="storage_turnover" min="1" max="5">
            <br>

            <label for="conservation_opportunity">This project provides opportunity for objects to receive conservation
                treatment:</label>
            <input type="range" id="conservation_opportunity" name="conservation_opportunity" min="1"
                max="5">
            <br>

            <label for="interpretive_update">This project provides opportunity to update interpretive content:</label>
            <input type="range" id="interpretive_update" name="interpretive_update" min="1" max="5">
            <br>

            <label for="enhance_display">This project provides opportunity to enhance the display of objects in a gallery
                (safety, aesthetic):</label>
            <input type="range" id="enhance_display" name="enhance_display" min="1" max="5">
            <br>

            <label for="steward">This project provides opportunity to better steward WAM’s collection:</label>
            <input type="range" id="steward" name="steward" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="code_law_regulation">This project satisfies a requirement outlined by code, law, or
                regulation:</label>
            <input type="range" id="code_law_regulation" name="code_law_regulation" min="1" max="5">
            <br>

            <label for="art_environment">This project will provide an opportunity to improve environmental systems where
                art is
                housed:</label>
            <input type="range" id="art_environment" name="art_environment" min="1" max="5">
            <br>

            <label for="hvac_art">This project will provide an opportunity for repairs to the envelop, cooling and heating
                systems where art is affected:</label>
            <input type="range" id="hvac_art" name="hvac_art" min="1" max="5">
            <br>

            <label for="hvac_nonart">This project will provide an opportunity for repairs to the envelop, cooling and
                heating
                systems where art is not affected:</label>
            <input type="range" id="hvac_nonart" name="hvac_nonart" min="1" max="5">
            <br>

            <label for="service_improvement">This project will improve customer service:</label>
            <input type="range" id="service_improvement" name="service_improvement" min="1" max="5">
            <br>

            <label for="efficient_process">This project will improve efficiency of work processes:</label>
            <input type="range" id="efficient_process" name="efficient_process" min="1" max="5">
            <br>

            <label for="public_aesthetics">This project will improve aesthetics of public areas:</label>
            <input type="range" id="public_aesthetics" name="public_aesthetics" min="1" max="5">
            <br>

            <label for="nonpublic_aesthetics">This project will improve aesthetics of nonpublic areas:</label>
            <input type="range" id="nonpublic_aesthetics" name="nonpublic_aesthetics" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="education_staff">This project does not require additional Ed/Exp staff and volunteers:</label>
            <input type="range" id="education_staff" name="education_staff" min="1" max="5">
            <br>

            <label for="visitation">This project expands visitation:</label>
            <input type="range" id="visitation" name="visitation" min="1" max="5">
            <br>

            <label for="program_enhancement">This project enhances events, programs, and classes:</label>
            <input type="range" id="program_enhancement" name="program_enhancement" min="1" max="5">
            <br>

            <label for="curricular_connection">This project increases curricular connections for K-12 schools and
                colleges:</label>
            <input type="range" id="curricular_connection" name="curricular_connection" min="1"
                max="5">
            <br>

            <label for="programming_space">This project increases programming space:</label>
            <input type="range" id="programming_space" name="programming_space" min="1" max="5">
            <br>

            <label for="augmentation">This project augments in-gallery interpretation:</label>
            <input type="range" id="augmentation" name="augmentation" min="1" max="5">
            <br>

            <label for="families">This project encourages family engagement:</label>
            <input type="range" id="families" name="families" min="1" max="5">
            <br>

            <label for="accessible">This project improves physical and interpretive accessibility:</label>
            <input type="range" id="accessible" name="accessible" min="1" max="5">
            <br>

            <label for="way_finding">This project eases way-finding:</label>
            <input type="range" id="way_finding" name="way_finding" min="1" max="5">
            <br>

            <label for="view_variety">This project broadens variety and number of objects on view:</label>
            <input type="range" id="view_variety" name="view_variety" min="1" max="5">
            <br>

            <label for="existing_community">This project strengthens existing community relationships:</label>
            <input type="range" id="existing_community" name="existing_community" min="1" max="5">
            <br>

            <label for="new_community">This project creates new community partnerships:</label>
            <input type="range" id="new_community" name="new_community" min="1" max="5">
            <br>

            <label for="education_market">This project fits well into Education marketing channels:</label>
            <input type="range" id="education_market" name="education_market" min="1" max="5">
            <br>

            <label for="deai_initiatives">This project supports DEAI initiatives:</label>
            <input type="range" id="deai_initiatives" name="deai_initiatives" min="1" max="5">
            <br>
        </fieldset>
        <fieldset>
            <label for="storage_capacity">This project will positively impact storage capacity:</label>
            <input type="range" id="storage_capacity" name="storage_capacity" min="1" max="5">
            <br>

            <label for="collections_access">This project will positively impact access to collections in storage:</label>
            <input type="range" id="collections_access" name="collections_access" min="1" max="5">
            <br>

            <label for="site_storage">This project will not require additional off-site storage:</label>
            <input type="range" id="site_storage" name="site_storage" min="1" max="5">
            <br>

            <label for="swing_space">This project will not require closure of galleries for swing space/storage of
                displaced
                material:</label>
            <input type="range" id="swing_space" name="swing_space" min="1" max="5">
            <br>

            <label for="add_storage">This project will free up/ give additional storage space:</label>
            <input type="range" id="add_storage" name="add_storage" min="1" max="5">
            <br>

            <label for="positive_impact">This project will positively impact collection management:</label>
            <input type="range" id="positive_impact" name="positive_impact" min="1" max="5">
            <br>

            <label for="inventory">This project will enable an inventory to take place, improve object records, produce new
                photography for security, or enable checking:</label>
            <input type="range" id="inventory" name="inventory" min="1" max="5">
            <br>

            <label for="av_staff">This project will not require additional staff due to addition of interactives in the
                galleries (AV, IT, Additional Preparators):</label>
            <input type="range" id="av_staff" name="av_staff" min="1" max="5">
            <br>

            <label for="current_collection">The current collection can support the project or subsequent
                programming:</label>
            <input type="range" id="current_collection" name="current_collection" min="1" max="5">
            <br>

            <label for="loan_embargo">This project will not require an embargo on outgoing or incoming loans:</label>
            <input type="range" id="loan_embargo" name="loan_embargo" min="1" max="5">
            <br>

            <label for="acquisitions_embargo">This project will not require an embargo on acquisitions:</label>
            <input type="range" id="acquisitions_embargo" name="acquisitions_embargo" min="1" max="5">
            <br>

            <label for="resource_conflict">This project will not cause a conflict of resources (staff, galleries, storage,
                other sorts of locations):</label>
            <input type="range" id="resource_conflict" name="resource_conflict" min="1" max="5">
            <br>
        </fieldset> --}}
        <button type='submit'>Submit</button>
    </form>
@endsection
