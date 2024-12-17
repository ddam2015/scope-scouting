<?php
/**
 * Template Name: Gold Teams
 */

get_header();
$award_id = $wp_query->query_vars['aw_id'];
$tournament_awards = g365_fn(['fn_name'=>'g365_remote_tournament_award', 'arguments'=>[['award_id'=>$award_id], 'null']]);
$tournament_awards = json_decode(json_encode($tournament_awards), true); 

class Team {
    // Properties (attributes)
    public $team;
    public $name;
    public $location;
    public $logo;

    // Constructor to initialize the object
    public function __construct($team, $name, $location, $logo) {
        $this->team = $team;
        $this->name = $name;
        $this->location = $location;
        $this-> logo = $logo;
    }
}

$d1teams = [
    new Team("Bowling Green State University", "Falcons", "Bowling Green, Ohio", "http://scopescouting.com/wp-content/uploads/2024/09/Bowling-Green.png"),
    new Team("Brigham Young University", "Cougars", "Provo, Utah","http://scopescouting.com/wp-content/uploads/2024/09/BYU.png"),
    new Team("Santa Clara University", "Broncos", "Santa Clara, California","http://scopescouting.com/wp-content/uploads/2024/09/Santa-Clara-University-Broncos.png"),
    new Team("California Baptist University", "Lancers", "Riverside, California","http://scopescouting.com/wp-content/uploads/2024/09/California-Baptist-University-Lancers.png"),
    new Team("Seattle University", "Redhawks", "Seattle, Washington","http://scopescouting.com/wp-content/uploads/2024/09/Seattle.png"),
    new Team("Troy University", "Trojans", "Troy, Alabama","http://scopescouting.com/wp-content/uploads/2024/09/Troy.png"),
    new Team("University at Buffalo", "Bulls", "Buffalo, New York","http://scopescouting.com/wp-content/uploads/2024/09/University-at-Buffalo-Bulls.png"),
    new Team("University of California Berkeley", "Golden Bears", "Berkeley, California","http://scopescouting.com/wp-content/uploads/2024/09/University-of-California-Berkeley-Golden-Bears.png"),
    new Team("University of California San Diego", "Tritons", "San Diego, California","http://scopescouting.com/wp-content/uploads/2024/09/UCSD.png"),
//     new Team("University of Florida", "Gators", "Gainsville, Florida", ""),
    new Team("University of Kentucky", "Wildcats", "Lexington, Kentucky","http://scopescouting.com/wp-content/uploads/2024/09/University-of-Kentucky-Wildcats.png"),
    new Team("Western Michigan University", "Broncos", "Kalamazoo, Michigan","http://scopescouting.com/wp-content/uploads/2024/09/Western-Michigan.png")
];

$d2teams = [
    new Team('Cal Poly Humboldt', 'Lumberjacks', 'Arcata, California','http://scopescouting.com/wp-content/uploads/2024/09/Cal-Poly-Humboldt-Lumberjacks.png'),
    new Team('California State University San Marcos', 'Cougars', 'San Marcos, California','http://scopescouting.com/wp-content/uploads/2024/09/California-State-University-San-Marcos-Cougars.png'),
    new Team('Concordia University Irvine', 'Golden Eagles', 'Irvine, California','http://scopescouting.com/wp-content/uploads/2024/09/Concordia-University-Irvine-Golden-Eagles.png'),
    new Team('Vanguard University', 'Lions', 'Costa Mesa, California','http://scopescouting.com/wp-content/uploads/2024/09/Vanguard-University-Lions.png')
];

$naiateams = [
  new Team('Bethany College',	'Swedes',	'Lindsborg, Kansas', 'http://scopescouting.com/wp-content/uploads/2024/09/Bethany-College-Swedes.png'),
  new Team('Corban University',	'Warriors',	'Salem, Oregon', 'http://scopescouting.com/wp-content/uploads/2024/09/Corban-University-Warriors.jpg'),
  new Team('Dakota Wesleyan University',	'Tigers',	'Mitchell, South Dakota', 'http://scopescouting.com/wp-content/uploads/2024/09/Dakota-Wesleyan-University-Tigers.png')
];
  
$d3teams = [
    new Team('Marymount University', 'Saints', 'Arlington, Virginia','http://scopescouting.com/wp-content/uploads/2024/09/Marymount-University-Saints.png'),
    new Team('Misericordia University', 'Cougars', 'Dallas, Pennsylvania','http://scopescouting.com/wp-content/uploads/2024/09/Misericordia-University-Cougars.webp'),
    new Team('Pacific University Oregon', 'Boxers', 'Forest Grove, Oregon','http://scopescouting.com/wp-content/uploads/2024/09/Pacific-University-Oregon-Boxers-1.png'),
    new Team('Whittier College', 'Poets', 'Whittier, California','http://scopescouting.com/wp-content/uploads/2024/09/Whittier-College-Poets-1.png')
];
  
$jucoteams = [
    new Team('Cypress College',	'Chargers',	'Cypress, California', 'http://scopescouting.com/wp-content/uploads/2024/09/Cypress-College-Chargers.png'),
    new Team('Mt. San Antonio College',	'Mounties',	'Walnut, California', 'http://scopescouting.com/wp-content/uploads/2024/09/Mt.-San-Antonio-College-Mounties-1.png'),
    new Team('Citrus College',	'Owls',	'Glendora, California', 'http://scopescouting.com/wp-content/uploads/2024/09/Citrus-College-Owls.png')
];

$womenteams = [
    new Team('Boise State University', 'Broncos', 'Boise, Idaho', 'http://scopescouting.com/wp-content/uploads/2024/09/Boise-State-University-Broncos-Copy.png'),
    new Team('Iowa State University', 'Cyclones', 'Ames, Iowa', 'http://scopescouting.com/wp-content/uploads/2024/09/Iowa-State-University-Cyclones.png'),
    new Team('Kent State University', 'Golden Flashes', 'Kent, Ohio', 'http://scopescouting.com/wp-content/uploads/2024/09/Kent-State-University-Golden-Flashes-1.png'),
    new Team('University of Tulsa', 'Golden Hurricanes', 'Tulsa, Oklahoma', 'http://scopescouting.com/wp-content/uploads/2024/09/University-of-Tulsa-Golden-Hurricanes-1.png'),
    new Team('Yale University', 'Bulldogs', 'New Haven, Connecticut', 'http://scopescouting.com/wp-content/uploads/2024/09/Yale-University-Bulldogs.png')
];
?>


<!-- </div></div></section> -->
<!-- <figure class="wp-block-image alignfull small-margin-top medium-margin-bottom img loading='lazy' decoding='aysnc'-wide"><img loading='lazy' decoding='aysnc' src="https://thestagecircuit.com/wp-content/uploads/2023/12/GoldBanner.jpg" alt="Open Gym Premier Facility Pic" class="wp-image-1212"></figure> -->
<section class="site-main ">
 <div class="grid-x grid-margin-x"><div class="cell small-12"></div></div>                  
<div class="">
  <section id="content" class="grid-x grid-margin-x site-main large-padding-top xlarge-padding-bottom gold-team-page" role="main">
    <div class="cell small-12" id="allTournamentBody">
      <h1 class="college-team-header">
        College Teams
      </h1>
      <div class="master-container">
        <div class="teams-header">
          <h1>
            D1 Teams
          </h1>
        </div>
        <?php 
         echo"<div class='gold-container'>";                
          foreach($d1teams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?> 
      </div>
      <div class="teams-header">
        <h1>
          D2 Teams
        </h1>
      </div>
      <?php 
         echo"<div class='gold-container'>";            
          foreach($d2teams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?>
      </div>
    
      <div class="teams-header">
        <h1>
          NAIA Teams
        </h1>
      </div>
      <?php 
         echo"<div class='gold-container'>";            
          foreach($naiateams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?>
      </div>

      <div class="teams-header">
        <h1>
          D3 Teams
        </h1>
      </div>
      <?php 
         echo"<div class='gold-container'>";            
          foreach($d3teams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?>
      </div>  

      <div class="teams-header">
        <h1>
          JUCO Teams
        </h1>
      </div>
      <?php 
         echo"<div class='gold-container'>";            
          foreach($jucoteams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?>
      </div>    


      <div class="teams-header">
        <h1>
          Womens Teams
        </h1>
      </div>
      <?php 
         echo"<div class='gold-container'>";            
          foreach($womenteams as $team){
          echo "
            <div class='nft scope-colleges'>
              <div class='main'>
                <img loading='lazy' decoding='aysnc' class='tokenImage' src='{$team->logo}' alt='{$team->name}' />
                <h4>{$team->team}</h4>
                <h4 class='gold-name'>{$team->name}</h4>
                <p class='description'>{$team->location}</p>
              </div>
            </div>
          ";
        }               
      ?>
      </div> 
                    
    </div>
  </section>
</div>
<?php echo $tournament_awards['aw_script']; get_footer(); ?>