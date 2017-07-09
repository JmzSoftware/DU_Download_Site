<!DOCTYPE html>

<html>

    <head>

        <title>Dirty Unicorns Downloads</title>

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo THEMEPATH; ?>/img/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo THEMEPATH; ?>/img/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo THEMEPATH; ?>/img/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo THEMEPATH; ?>/img/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo THEMEPATH; ?>/img/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo THEMEPATH; ?>/img/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo THEMEPATH; ?>/img/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo THEMEPATH; ?>/img/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo THEMEPATH; ?>/img/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo THEMEPATH; ?>/img/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo THEMEPATH; ?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo THEMEPATH; ?>/img/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo THEMEPATH; ?>/img/favicon-16x16.png">
	<link rel="manifest" href=<?php echo THEMEPATH; ?>"/img/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content=<?php echo THEMEPATH; ?>"/img/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<meta property="og:url" content="https://download.dirtyunicorns.com"/>
	<meta property="og:title" content="Dirty Unicorns Download"/>
	<meta property="og:image" content="http://i.imgur.com/IZck99R.png"/>
	<meta property="og:description" content="Get all you Dirty Unicorns needs here" />
	<meta property="og:type" content="website"/>

        <!-- STYLES -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEPATH; ?>/css/style.css">

        <!-- SCRIPTS -->
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo THEMEPATH; ?>/js/directorylister.js"></script>

        <!-- FONTS -->
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,500|Roboto+Mono' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <!-- META -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">

        <?php file_exists('analytics.inc') ? include('analytics.inc') : false; ?>

    </head>

    <body>

        <div class="wrapper">
            <div id="page-navbar" class="navbar navbar-default navbar-fixed-top">
                <div class="container">

                    <?php $breadcrumbs = $lister->listBreadcrumbs(); ?>

                    <p class="navbar-text">
                        <?php foreach($breadcrumbs as $breadcrumb): ?>
                            <?php if ($breadcrumb != end($breadcrumbs)): ?>
                                    <a href="<?php echo $breadcrumb['link']; ?>"><?php echo $breadcrumb['text']; ?></a>
                                    <span class="divider">/</span>
                            <?php else: ?>
                                <?php echo $breadcrumb['text']; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </p>

                    <div class="navbar-right">

                        <ul id="page-top-nav" class="nav navbar-nav">
                            <li>
                                <a href="javascript:void(0)" id="page-top-link">
                                    <i class="material-icons" style="font-size: 20px">arrow_upward</i>
                                </a>
                            </li>
                        </ul>

                        <?php  if ($lister->isZipEnabled()): ?>
                            <ul id="page-top-download-all" class="nav navbar-nav">
                                <li>
                                    <a href="?zip=<?php echo $lister->getDirectoryPath(); ?>" id="download-all-link">
                                        <i class="material-icons" style="font-size: 20px">file_download</i>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>

                    </div>

                </div>
            </div>

            <div id="page-content" class="container">

                <?php file_exists('header.php') ? include('header.php') : include($lister->getThemePath(true) . "/default_header.php"); ?>

                <?php if($lister->getSystemMessages()): ?>
                    <?php foreach ($lister->getSystemMessages() as $message): ?>
                        <div class="alert alert-<?php echo $message['type']; ?>">
                            <?php echo $message['text']; ?>
                            <a class="close" data-dismiss="alert" href="#">&times;</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>

                <div id="directory-list-header">
                    <div class="row">
                        <div class="col-md-7 col-sm-6 col-xs-10">File</div>
                        <div class="col-md-2 col-sm-2 col-xs-2">Size</div>
			<div class="col-md-2 col-sm-3 hidden-xs">Downloads</div>
                        <div class="col-md-3 col-sm-3 hidden-xs">Last Modified</div>
                    </div>
                </div>

                <ul id="directory-listing" class="nav nav-pills nav-stacked">

                    <?php foreach($dirArray as $name => $fileInfo): ?>
                        <li data-name="<?php echo $name; ?>" data-href="<?php echo $fileInfo['url_path']; ?>">
			    <a href="<?php if(is_dir($fileInfo['file_path'])) { echo '?dir=' . $fileInfo['file_path']; } elseif($fileInfo['icon_class'] == 'icon-up-dir') { echo  $fileInfo['file_path']; } else { echo 'download.php?file='. $fileInfo['file_path']; } ?>" class="clearfix" data-name="<?php echo $name; ?>">



                                <div class="row">
                                    <span class="file-name col-md-7 col-sm-6 col-xs-9">
                                        <i class="material-icons" style="font-size: 20px;"><?php echo $fileInfo['icon_class'] === 'fa-folder' ? 'folder' : 'description'; ?></i>
                                        <?php echo $name; ?>
                                    </span>

                                    <span class="file-size col-md-2 col-sm-2 col-xs-3">
                                        <?php echo $fileInfo['file_size']; ?>
                                    </span>

                                    <span class="fileDownloads col-md-2 col-sm-2 hidden-xs">
					<?php echo $fileInfo['file_downloads']; ?>
                                    </span>

                                    <span class="file-modified col-md-3 col-sm-3 hidden-xs">
                                        <?php echo $fileInfo['mod_time']; ?>
                                    </span>
                                </div>

                            </a>

                            <?php if (is_file($fileInfo['file_path'])): ?>

                                <a href="javascript:void(0)" class="file-info-button">
                                    <i class="material-icons" style="font-size: 20px">info</i>
                                </a>

                            <?php else: ?>

                                <?php if ($lister->containsIndex($fileInfo['file_path'])): ?>

                                    <a href="<?php echo $fileInfo['file_path']; ?>" class="web-link-button" <?php if($lister->externalLinksNewWindow()): ?>target="_blank"<?php endif; ?>>
                                        <i class="material-icons" style="font-size: 20px">launch</i>
                                    </a>

                                <?php endif; ?>

                            <?php endif; ?>

                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <div class="push"></div>
        </div>

        <?php file_exists('footer.php') ? include('footer.php') : include($lister->getThemePath(true) . "/default_footer.php"); ?>

        <div id="file-info-modal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">{{modal_header}}</h4>
                    </div>

                    <div class="modal-body">

                        <table id="file-info" class="table table-bordered">
                            <tbody>

                                <tr>
                                    <td class="table-title">MD5</td>
                                    <td class="md5-hash">{{md5_sum}}</td>
                                </tr>

                                <tr>
                                    <td class="table-title">SHA1</td>
                                    <td class="sha1-hash">{{sha1_sum}}</td>
                                </tr>

                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>

    </body>

</html>
