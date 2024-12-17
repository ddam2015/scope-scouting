<?php
/**
 * Template Name: Players Page
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
    <h1 class="text-center">Players</h1>
    <section class="eval-nav">
      
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
          <button type="submit" style="margin: 10px 0; padding: 7px 15px; font-size: 16px; background-color: #005b0e; color: white; border: none; cursor: pointer;">
              Filter
          </button>
      </form>
      
      <div class="container grid-x grid-margin-x small-up-2 medium-up-3 large-up-4 text-center profile-feature medium-margin-top mobile-horizontal-nav-outer" id="organization-list">
        <div class="grid-x grid-margin-x small-up-2 medium-up-6 large-up-6 align-center text-center img-grid small-padding-sides" id="statMobileNav">
            <div class="cell relative small-margin-bottom stat-organization is-selected " id="scopeSelectOrg">
            <a href="#" data-org-id="all">
              <img class="scope-white" loading="lazy" src="http://dev.scopescouting.com/wp-content/uploads/2024/07/Scope-Scouting-Icon-White-400x300-1.png" alt="Display All">
              <img class="scope-green" loading="lazy" src="http://dev.scopescouting.com/wp-content/uploads/2024/06/Scope-Scouting-Icon-400x300-1.png" alt="Display All"><br>All Brands</a>
            </div> 
            <div class="cell relative small-margin-bottom stat-organization">
            <a href="#" data-org-id="3191">
              <img class="" loading="lazy" src="http://dev.scopescouting.com/wp-content/uploads/2024/07/g365-logo-400x300-1.png" alt="grassroots-365"><br><p class="hide">Grassroots 365</p></a>
            </div>    
            <div class="cell relative small-margin-bottom stat-organization">
            <a href="#" data-org-id="2">
              <img class="" loading="lazy" src="https://elitebasketballcircuit.com/wp-content/themes/ebc-press/assets/tiny-logos/ebc_tiny_dk.png" alt="ebc"><br><p class="hide">Elite Basketball Circuit</p></a>
            </div>                           
            <div class="cell relative small-margin-bottom stat-organization">
            <a href="" data-org-id="3">
              <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/the_stage_400x300.png" alt="the-stage"><br><p class="hide">The Stage</p></a>
            </div>                                
            <div class="cell relative small-margin-bottom stat-organization">
            <a href="" data-org-id="7165">
              <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/ss_400x300.png" alt="scholastic-series"><br><p class="hide">Scholastic Series</p></a>
            </div>                                
            <div class="cell relative small-margin-bottom stat-organization">
              <a href="" data-org-id="7164">
                <img class="" loading="lazy" src="https://dev.sportspassports.com/wp-content/uploads/org-logos/hhh_400x300.png" alt="hype-her-hoops-circuit"><br><p class="hide">Hype Her Hoops</p></a>
            </div>                                
          </div>                                
        </div>

<div class="reveal" id="eval-modal" data-reveal data-close-on-click="true" data-animation-in="fade-in" data-animation-out="fade-out">
  <h1 id="evalModalHeading"></h1>
  <div id="additionalInfoModal">
    
  </div>
  <p id="fullEvalModal"></p>
  <button class="close-button" data-close aria-label="Close reveal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

      <div class="relative">
        <span class="search-mag fi-magnifying-glass"></span>
        <div class="ls_container">
        <form accept-charset="UTF-8" class="search" id="search_player_profiles_undefined_0" name="ls_form">
            <input type="hidden" name="ls_anti_bot" class="ls_anti_bot" value="ajaxlivesearch_guard"><input type="hidden" name="g365_session" value="c912b1996cc986f86b635bdbd5748d34">
            <input type="hidden" name="g365_token" class="ls_token" value="23ef21d477eaaf219a445a9d5b2da7b86feaca779e668afe08a6fb205f29f3c7">
            <input type="hidden" name="g365_time" class="ls_page_loaded_at" value="1719614865"><input type="hidden" name="ls_current_page" class="ls_current_page" value="1">
            <input type="hidden" name="ls_query_id" value="player_profiles"><input type="text" id="player-search" class="search-hero g365_livesearch_input ls_query" data-g365_type="player_profiles" placeholder="Enter Player Name" autocomplete="off" autofocus="" name="ls_query" maxlength="60"><div class="ls_result_div" style="display: none;"><div class="ls_result_main"><table class="unstriped compact expanded no-margin-bottom"><tbody></tbody></table></div><div class="grid-x ls_result_footer"><div class="cell small-12 page_limit"><select name="ls_items_per_page" class="ls_items_per_page"><option value="0">All</option><option value="10" selected="">10</option><option value="20">20</option></select></div><div class="cell shrink navigation"><i class="left-arrow-button ls-arrow ls_previous_page" tabindex="0"></i></div><div class="cell shrink navigation pagination"><label class="ls_current_page_lbl">1</label> / <label class="ls_last_page_lbl"></label></div><div class="cell shrink navigation"><i class="right-arrow-button ls-arrow ls_next_page" tabindex="0"></i></div></div></div></form></div>
      </div>
    </section>
    
    









<!-- dummy player list -->
    <?php
    // Check if the form was submitted and capture the selected season
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['season'])) {
        $selected_season = sanitize_text_field($_POST['season']); // Capture the season from the form
    } else {
        // Fallback to the current season
        $selected_season = getCurrentSeason();
    }
    
    
    $pl_inf = spp_fn(['fn_name'=>'spp_grab_info', 'arguments'=>['plyer_info', ['target_url'=>get_site_url(), 'season' => $selected_season]]]); //this should grab the function message.....hopefully.
    $pl_inf = json_decode(json_encode($pl_inf), true);
//       echo '<br> ' . $pl_inf['message'] . ' <br><br><br>' . print_r($pl_inf['query_result']);
 
    if (!isset($pl_inf['query_result']) || !is_array($pl_inf['query_result'])) {
        return '<p>No results found.</p>';
    }
  // Collect all event_ids and player_ids
    $event_ids = [];
    $player_ids = [];
    foreach ($pl_inf['query_result'] as $result) {
        $stat_trends = json_decode($result['stat_trends'], true);
        $event_ids[] = $stat_trends['ss_event_participated'];
        $player_ids[] = $result['player_id'];
    }
  
    $team_name = spp_fn(['fn_name'=>'spp_grab_info', 'arguments'=>['grab_team_info', ['target_url'=>get_site_url(), 'player_id'=>$player_ids, 'event_id'=>$event_ids]]]);
    $team_name = json_decode(json_encode($team_name), true);
      
    ?>
    <ul class="grid-y eval-list eval-list--players" id="player-list">
    <?php
      foreach ($pl_inf['query_result'] as $index => $result){
        // Extract the year from 'event_time'
         $event_time = esc_html($result['event_time']);
        $date = new DateTime($event_time);
        $year = $result['player_class'];
        $stat_trends = json_decode($result['stat_trends'], true);
        $event = $stat_trends['ss_event_participated'];
        $display = $stat_trends['front_page'];
        $ssEval = $stat_trends['ss_evaluation']; //specificall for HHH at the moment so it does not conflict with hhh scouting report
        $ssOrg = $result['event_brand'];
        
        $play_id = $result['player_id'];
        $team_name_info = $team_name['team_info'][$index];
        $event_details = $team_name['event_info'][$event];
        $org_id = $stat_trends['ss_event_participated'];;
        $team_search = $team_name_info[0]['team_search'] ?? '';
        
        $org_search = $result['org_name'];  
        if(str_contains($org_search, ',')) {
          $cleanOrgName = explode("," , $org_search);
          $org_search = $cleanOrgName[1];
        }
        $event_short_name = $result['event_short'] ?? '';
//         echo 'testing: ' /*. print_r($result)*/ . ' // ' . print_r($result);
//        if (isset($team_name['team_info']) && is_array($team_name['team_info']) && isset($team_name['team_info'][0]['org_search'])) {
//             $org_search = $team_name['team_info'][0]['org_search'];
//             $team_search = isset($team_name['team_info'][0]['team_search']) ? $team_name['team_info'][0]['team_search'] : '';
//             $event_part = isset($team_name['team_info'][0]['event_name']) ? $team_name['team_info'][0]['event_name'] : '';
// //             echo '<br><br><br>';
// //             print_r($team_name['event_id']);
//         }
        
        $evalDate = $result['eval_date']; // Assume this is '2024-08-27 23:05:36'
        $date = new DateTime($evalDate);
        $formattedDate = $date->format('m/d/y'); // This will give '08/27/24'
        ?> 
        <li class="eval-listItem" data-org-id="<?php echo esc_html($result['event_brand']); ?>">
        <div class="grid-x grid-y-small">
        <img src="<?php echo (!empty(esc_html($result['player_image'])) ? 'https://sportspassports.com/wp-content/uploads/player-profiles/'.esc_html($result['player_image']) : 'https://dev.sportspassports.com/wp-content/uploads/event-profiles/'.'g365_profile_placeholder.gif' ) ?>" alt="" class="" loading="lazy">
 

        </div>
        <div class="eval-full-text">
          <div class="eval-info"> 
            <h3 class="player-name" > <?php echo esc_html($result['player_name']) ?><span class="hide-for-small-only"> | <?php echo $year ?> <?php echo (!empty($org_search) ? '| '.esc_html($org_search) : '' ) ?></span></h3>
            <p class="show-for-small-only"> <?php echo $year ?> </p>
            <p class="show-for-small-only" class="player-event" data-event-brand="<?php echo esc_html($result['event_brand']) ?>" data-full-event-name=" <?php echo esc_html($result['event_name']) ?>"> <?php echo (!empty($org_search) ? esc_html($org_search) : esc_html($event_short_name) ) ?> </p>
            <p class="player-event"> <?php echo esc_html($event_short_name) ?> </p>
            <p class="player-date"> <?php echo $formattedDate ?> </p>
          </div>
          <p class="eval-body"><?php echo ((!empty($ssEval)) ? $ssEval : $result['player_eval']) ?> </p>
        </div>
        <button class="read-eval-btn">read more</button>
        </li>

      <?php } ?>

      </ul>
    <?php

   ?> 
<!--   end dummy player list -->
  </div>
</section>

<?php get_footer(); ?>


<script>  

  
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("player-search");
    const playerList = document.getElementById("player-list");
    const players = playerList.getElementsByClassName("eval-listItem");
    const organizationLinks = document.querySelectorAll("#organization-list a");
    let selectedOrg = "all";

    function filterPlayers() {
        const searchTerm = searchInput.value.toLowerCase();

        for (let i = 0; i < players.length; i++) {
            const playerName = players[i].getElementsByClassName("player-name")[0].innerText.toLowerCase();
            const playerOrg = players[i].getAttribute("data-org-id");

            if ((selectedOrg === "all" || playerOrg === selectedOrg) && playerName.includes(searchTerm)) {
                players[i].style.display = "";
            } else {
                players[i].style.display = "none";
            }
        }
    }

    searchInput.addEventListener("input", filterPlayers);

    organizationLinks.forEach(link => {
        link.addEventListener("click", function(event) {
            event.preventDefault();
            
            // Remove is-selected class from all links
            organizationLinks.forEach(link => link.parentElement.classList.remove("is-selected"));
            
            // Add is-selected class to the clicked link
            this.parentElement.classList.add("is-selected");

            // Update selectedOrg and filter players
            selectedOrg = this.getAttribute("data-org-id");
            filterPlayers();
        });
    });
});
</script>
