<?php
	// Sets the image folder for background
	$image_folder = APPPATH . '../assets/css/images';
	// Gets the file iterator
	$fi = new FilesystemIterator($image_folder, FilesystemIterator::SKIP_DOTS);
	// Gets the random index for the background photos
	$i = rand(1, iterator_count($fi) - 1); // generate random number size of the array
	$i = $i < 10 ? '0' . $i : $i;
    // Generates language link
    $linkLanguages = array(anchor('langswitch/switchLanguage/english', '<span class="blue-text icon-United-Kingdom tp-icon"></span>'),
                            anchor('langswitch/switchLanguage/vietnamese', '<span class="red-text icon-Vietnam tp-icon"></span>'));
    // Generates menu links
    $menuItems = array(
        'trips' => anchor('/trips', ucwords($this->lang->line('Trip'))),
        'admin'=>anchor('/admin', ucwords($this->lang->line('Admin')))
    );
    $menuLi = '';
    foreach($menuItems as $item=>$link){
        $classActive = (strtolower($ControllerName) === $item) ? 'active': '';
        $menuLi .= "<li class=\"{$classActive}\">{$link}</li>";
    }
    // Array of CSS files
    $fileCss = array(
        "assets/css/iconsmind/style.css",
        "assets/css/font-awesome/css/font-awesome.min.css",
        "assets/css/materialize/materialize.css",
        "assets/css/main.css"
    );
    echo doctype();
?>
<html>
    <head>
	    <meta charset="UTF-8">
<!--	    <meta http-equiv="Content-Type" content="text/html">-->
        <title>Trip Planner</title>
        <!-- Optional theme -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	    <?php
        // Prints css links
        foreach($fileCss as $url){
            echo link_tag($url);
        }
	    // Only print this script segment when we have create trips action
	    if($ControllerName === 'trips' && $ActionName === 'create'): ?>
            <script type="text/javascript">
            <?php echo "var date_locale ='{$SiteDateJs}';"; ?>
            </script>
	    <?php endif; ?>
	    <?php
	    // Only shows background for home page
	    if($ControllerName === 'index'): ?>
            <style type="text/css">
                <!--
                body{
                    background: url("<?php echo base_url('assets/css/images/bg_' . $i . '.jpg'); ?>") no-repeat;
                    background-size: cover;
                }
                -->
            </style>
	    <?php endif; ?>
    </head>
    <body>
        <!-- Fixed navbar -->
        <div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper container">
                    <a href="<?php echo base_url("/") ?>" class="brand-logo center">TripAll</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
<!--                    Left menu-->
                    <ul id="main-menu" class="left hide-on-med-and-down">
                        <?php echo $menuLi ?>
                    </ul>
<!--                    Left menu end-->
<!--                    Language menu-->
                    <?php
                        echo ul($linkLanguages, array('class'=>'right hide-on-med-and-down', 'id'=>'main-lang-menu'));
                    ?>
<!--                    Language menu end-->
<!--                    Mobile menu-->
                    <ul class="side-nav" id="mobile-demo">
                        <?php
                            echo $menuLi;
                            foreach($linkLanguages as $link){
                                echo "<li>{$link}</li>";
                            }
                        ?>
                    </ul>
<!--                    Mobile menu end-->
                </div>
            </nav>
        </div>
        <div class="container">
	        <div class="page-header">
		        <h1><?php echo $Title ?></h1>
	        </div>