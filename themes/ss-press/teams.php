<?php
/**
 * Template Name: Teams Page
 */
get_header();


// Function to determine the current season based on today's date
function getCurrentSeason() {
    $today = new DateTime();
    $year = $today->format('Y');
    $month = $today->format('m');

    // If it's September or later, the current season is this year - next year
    if ($month >= 9) {
        return $year . '-' . ($year + 1);
    } else {
        // If it's before September, the current season is last year - this year
        return ($year - 1) . '-' . $year;
    }
}
?>

<section id="content" class="grid-x site-main featured-image small-padding-top xlarge-padding-bottom" role="main">
    <div class="cell small-12">
        <h1 class="text-center">Teams</h1>
        <section class="eval-nav">
            <div class="container grid-x grid-margin-x small-up-2 medium-up-3 large-up-4 text-center profile-feature medium-margin-top mobile-horizontal-nav-outer" id="organization-list">
                <div class="grid-x grid-margin-x small-up-2 medium-up-6 large-up-6 align-center text-center img-grid" id="statMobileNav">
                    <div class="cell relative small-margin-bottom stat-organization is-selected" id="scopeSelectOrg">
                        <a href="#" data-org-id="all">
                            <img class="scope-white" loading="lazy" src="http://dev.scopescouting.com/wp-content/uploads/2024/07/Scope-Scouting-Icon-White-400x300-1.png" alt="Display All">
                            <img class="scope-green" loading="lazy" src="http://dev.scopescouting.com/wp-content/uploads/2024/06/Scope-Scouting-Icon-400x300-1.png" alt="Display All"><br>All Brands</a>
                    </div>
                    <div class="cell relative small-margin-bottom stat-organization">
                        <a href="#" data-org-id="3191">
                            <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/g365_400x300.png" alt="grassroots-365"><br><p class="hide">Grassroots 365</p></a>
                    </div>
                    <div class="cell relative small-margin-bottom stat-organization hide">
                        <a href="#" data-org-id="2">
                            <img class="" loading="lazy" src="https://elitebasketballcircuit.com/wp-content/themes/ebc-press/assets/tiny-logos/ebc_tiny_dk.png" alt="ebc"><br><p class="hide">Elite Basketball Circuit</p></a>
                    </div>
                    <div class="cell relative small-margin-bottom stat-organization">
                        <a href="#" data-org-id="3">
                            <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/the_stage_400x300.png" alt="the-stage"><br><p class="hide">The Stage</p></a>
                    </div>
                    <div class="cell relative small-margin-bottom stat-organization">
                        <a href="#" data-org-id="7165">
                            <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/ss_400x300.png" alt="scholastic-series"><br><p class="hide">Scholastic Series</p></a>
                    </div>
                    <div class="cell relative small-margin-bottom stat-organization">
                        <a href="#" data-org-id="7164">
                            <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/hhh_400x300.png" alt="hype-her-hoops-circuit"><br><p class="hide">Hype Her Hoops</p></a>
                    </div>
                </div>
            </div>

        <div class="relative">
            <span class="search-mag fi-magnifying-glass"></span>
            <div class="ls_container">
                <form accept-charset="UTF-8" class="search" id="search_team_profiles_undefined_0" name="ls_form">
                    <input type="hidden" name="ls_anti_bot" class="ls_anti_bot" value="ajaxlivesearch_guard"><input type="hidden" name="g365_session" value="c912b1996cc986f86b635bdbd5748d34">
                    <input type="hidden" name="g365_token" class="ls_token" value="23ef21d477eaaf219a445a9d5b2da7b86feaca779e668afe08a6fb205f29f3c7">
                    <input type="hidden" name="g365_time" class="ls_page_loaded_at" value="1719614865"><input type="hidden" name="ls_current_page" class="ls_current_page" value="1">
                    <input type="hidden" name="ls_query_id" value="team_profiles"><input type="text" id="team-search" class="search-hero g365_livesearch_input ls_query" data-g365_type="team_profiles" placeholder="Enter Team Name" autocomplete="off" autofocus="" name="ls_query" maxlength="60"><div class="ls_result_div" style="display: none;"><div class="ls_result_main"><table class="unstriped compact expanded no-margin-bottom"><tbody></tbody></table></div><div class="grid-x ls_result_footer"><div class="cell small-12 page_limit"><select name="ls_items_per_page" class="ls_items_per_page"><option value="0">All</option><option value="10" selected="">10</option><option value="20">20</option></select></div><div class="cell shrink navigation"><i class="left-arrow-button ls-arrow ls_previous_page" tabindex="0"></i></div><div class="cell shrink navigation pagination"><label class="ls_current_page_lbl">1</label> / <label class="ls_last_page_lbl"></label></div><div class="cell shrink navigation"><i class="right-arrow-button ls-arrow ls_next_page" tabindex="0"></i></div></div></div></form></div>
        </div>
        </section>
      
       <form method="POST" action="" style="display: flex; align-items: center; gap: 10px;">
            <label for="season" style="margin-right: 10px; white-space: nowrap;">Select Season:</label>
            <select id="season" name="season" style="padding: 5px; font-size: 16px; width: 220px;">
                <?php 
                // Get the current season based on POST value or fallback to the current season function
                $currentSeason = isset($_POST['season']) ? $_POST['season'] : getCurrentSeason();  

                // Define the first season (2023-2024)
                $firstYear = 2023;
                $today = new DateTime();
                $currentYear = $today->format('Y');
                $currentMonth = $today->format('m');

                // Determine if the current season is this year or last year
                if ($currentMonth >= 9) {
                    $startYear = $currentYear;
                } else {
                    $startYear = $currentYear - 1;
                }

                // Generate the options for the dropdown with date ranges
                for ($year = $startYear; $year >= $firstYear; $year--) {
                    $startDate = $year . '-09-01';
                    $endDate = ($year + 1) . '-08-31';
                    $seasonLabel = $year . '-' . ($year + 1);
                    $seasonValue = $startDate . ' AND ' . $endDate;

                    // Set the selected option based on the form submission or current season
                    echo '<option value="' . $seasonValue . '"' . (isset($_POST['season']) && $_POST['season'] == $seasonValue ? ' selected' : '') . '>' . $seasonLabel . '</option>';
                }
                ?>
            </select>
            <button type="submit" style="padding: 7px 15px; font-size: 16px; background-color: #005b0e; color: white; border: none; cursor: pointer;">
                Filter
            </button>
        </form>
      
    </section>

    <?php 
    // Check if the form was submitted and capture the selected season
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['season'])) {
        $selected_season = sanitize_text_field($_POST['season']); // Capture the season from the form
    } else {
        // Fallback to the current season
        $selected_season = getCurrentSeason();
    }
  
  
  
    $pl_inf = spp_fn(['fn_name'=>'spp_grab_info', 'arguments'=>['team_info', ['target_url'=>get_site_url(), 'season' => $selected_season]]]); //this should grab the function message.....hopefully.
    $pl_inf = json_decode(json_encode($pl_inf), true);
//     echo '<br> ' . $pl_inf['message'] . ' <br><br><br>' . print_r($pl_inf['query_result']);
    
    $return_string = '';
  
    if (isset($pl_inf['query_result']) && is_array($pl_inf['query_result'])) {
      $return_string = '
        <ul class="grid-y eval-list eval-list--teams" id="team-list">
           ';
      foreach ($pl_inf['query_result'] as $result){
//         echo 'testing: ' . print_r($result) . ' <br><br>';
        $stat_trends = json_decode($result['stat_trends'], true);
        $events_participated = $stat_trends['ss_event_participated'] ?? 'N/A';
        
        $event_info = spp_fn(['fn_name'=>'spp_grab_info', 'arguments'=>['get_event_info', ['target_url'=>get_site_url(), 'event_id'=>$events_participated]]]);
        $event_info = json_decode(json_encode($event_info), true);
        $event_org = $event_info['event_info'][0]['id'];
        $event_short_name = $event_info['event_info'][0]['short_name'];
        $event_full_name = $event_info['event_info'][0]['name'];

        $return_string .= '<li class="eval-listItem" data-org-id="' .  $result['event_brand'] . '">
                              <div class="grid-x grid-y-small">
                                <img src="' . (!empty(esc_html($result['org_img'])) ? 'https://sportspassports.com/wp-content/uploads/org-logos/'.esc_html($result['org_img']) : 'https://dev.sportspassports.com/wp-content/uploads/event-profiles/'.'g365_profile_placeholder.gif' ) . '" alt="" class="" loading="lazy">
                              </div>
                              <div class="eval-full-text">
                                <div class="eval-info">';
            $return_string .= '   <h3 class="team-name">' . esc_html($result['org_name']) . '<span class="hide-for-small-only"> | '.  esc_html($result['team_name']) .'| '. esc_html($result['org_city']) . ', ' . esc_html($result['org_state']) .'</span> </h3>';
            $return_string .= '   <p class="show-for-small-only">' . esc_html($result['team_name']) . ' </p>';
            $return_string .= '   <p class="team-event show-for-small-only" data-event-brand = "'. esc_html($result['event_brand']) .'" data-full-event-name="' . esc_html($event_full_name) . '">' . esc_html($result['org_city']) . ', ' . esc_html($result['org_state']) . ' </p>';
            $return_string .= ' </div>';
          $return_string .= ' <p class="eval-body">' . ($result['team_eval']) . ' </p>
                              </div>
                              <button class="read-eval-btn">read more</button>
                             </li>';
      }
      $return_string .= ' </ul>';
    } else {
          echo '<p>No results found.</p>';
    }
    
    echo $return_string;
    ?>
  </div>
</section>

<?php get_footer(); ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("team-search");
    const teamList = document.getElementById("team-list");
    const teams = teamList.getElementsByClassName("eval-listItem");
    const organizationLinks = document.querySelectorAll("#organization-list a");
    let selectedOrg = "all";

    function filterTeams() {
        const searchTerm = searchInput.value.toLowerCase();

        for (let i = 0; i < teams.length; i++) {
            const teamName = teams[i].getElementsByClassName("team-name")[0].innerText.toLowerCase();
            const teamOrg = teams[i].getAttribute("data-org-id");

            if ((selectedOrg === "all" || teamOrg === selectedOrg) && teamName.includes(searchTerm)) {
                teams[i].style.display = "";
            } else {
                teams[i].style.display = "none";
            }
        }
    }

    searchInput.addEventListener("input", filterTeams);

    organizationLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            
            // Remove is-selected class from all links
            organizationLinks.forEach(link => link.parentElement.classList.remove("is-selected"));
            
            // Add is-selected class to the clicked link
            this.parentElement.classList.add("is-selected");

            // Update selectedOrg and filter teams
            selectedOrg = this.getAttribute("data-org-id");
            filterTeams();
        });
    });
});
</script>
