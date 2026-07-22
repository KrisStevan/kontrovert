<html>
	<head>
        <script src="global-layout.js" defer></script>
        <global-header></global-header>
        <style>
            #hero-inner-menu ul { margin: 0; padding: 0; }
            #hero-inner-menu li { list-style: none; }
            #hero-inner-menu .article-list { 
                margin: 0; 
                overflow: hidden; 
                max-height: 0; 
                transition: max-height 300ms ease; 
            }
            
            #hero-inner-menu .article-list.open { 
                /* when open, max-height is set inline to the scrollHeight */
            }
            
            #hero-inner-menu a.topic-link { 
                cursor: pointer; 
                display: block; 
            }
        </style>
	</head>
    <body>
        <!--bagian untuk isinya -->
		<div class="hero" role="banner">
            <div class="hero-inner-materi">

                <!--left side-->
                <div id="hero-inner-menu"> <!--ref = nav-menu-->
                    <ul>
                        <!--referensi = https://www.simonbattersby.com/blog/building-a-css-vertical-expanding-menu-with-flyouts-stage-2/-->
                        <?php
                            require_once 'db.inc.php';
                            connect_db($db);

                            $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

                            $sqlstr = 'SELECT id, name FROM materials WHERE topics_id = ' . $id . ' ORDER BY name ASC';
                            $result = mysqli_query($db, $sqlstr);

                                if ($result && mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $id = (int) $row['id'];
                                        $namaTopik = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                                        $topicUrl = 'materi.php?id=' . $id;

                                        //articles per material
                                        $sqlstr2 = 'SELECT id, judul FROM articles WHERE idMateri = ' . $id . ' ORDER BY judul ASC';
                                        $result2 = mysqli_query($db, $sqlstr2);

                                        if ($result2 && mysqli_num_rows($result2) > 0) {
                                            echo '<li class="has-articles">
                                                <a href="#" class="topic-link" aria-expanded="false">' . $namaTopik . '</a>';
                                                echo '<ul class="article-list">';
                                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                                        $articleId = (int) $row2['id'];
                                                        $articleTitle = htmlspecialchars($row2['judul'], ENT_QUOTES, 'UTF-8');
                                                        $articleUrl = $topicUrl . '&article=' . $articleId;
                                                        echo '<li><a href="' . htmlspecialchars($articleUrl, ENT_QUOTES, 'UTF-8') . '">' . $articleTitle . '</a></li>';
                                                    }
                                                echo '</ul></li>';
                                        } else {
                                            echo '<li><a href="#">' . $namaTopik . '</a></li>';
                                        }
                                    }
                                } else {
                                    echo '<li><a href="#">Tidak ada materi</a></li>';
                                }
                        ?>
                    </ul>
                </div>

                <!--right side-->
                <div class="hero-inner-main">
                    <h2 class="page-title">Materi</h2>
                    <div class="hero-cta">
                        <p>Selamat datang di halaman materi. Silakan pilih topik dari menu di sebelah kiri untuk melihat materi yang tersedia.</p>
                    </div>
                </div>
            </div>
        </div>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>
        <script>
            //DOMContentLoaded = executed after page loaded, but before images and other resources are loaded
            document.addEventListener('DOMContentLoaded', function () {
                //what to be clicked to open the submenu
                var links = document.querySelectorAll('#hero-inner-menu .topic-link');
                
                // initialize submenus to collapsed
                document.querySelectorAll('#hero-inner-menu .article-list').forEach(function (ul) {
                    ul.style.maxHeight = '0px';
                });

                links.forEach(function (link) {
                    var submenu = link.nextElementSibling;
                    link.addEventListener('click', function (e) {
                        e.preventDefault();

                        //classList = used to add/remove css names
                        //contains = check if class exists, toggle = add/remove class
                        if (!submenu || !submenu.classList.contains('article-list')) return;
                        var isOpen = submenu.classList.contains('open');

                        // close all submenus
                        document.querySelectorAll('#hero-inner-menu .article-list.open').forEach(function (ul) {
                            ul.classList.remove('open');
                            ul.style.maxHeight = '0px';
                            var prevLink = ul.previousElementSibling;
                            if (prevLink && prevLink.classList.contains('topic-link')) {
                                prevLink.setAttribute('aria-expanded', 'false');
                            }
                        });

                        // if it was closed, open it
                        if (!isOpen) {
                            submenu.classList.add('open');
                            // set to exact height for smooth animation
                            submenu.style.maxHeight = submenu.scrollHeight + 'px';
                            link.setAttribute('aria-expanded', 'true');
                        } else {
                            // already closed by the loop above; ensure aria
                            link.setAttribute('aria-expanded', 'false');
                        }
                    });

                    // when transition ends, if open, remove maxHeight to allow natural growth
                    submenu.addEventListener('transitionend', function () {
                        if (submenu.classList.contains('open')) {
                            submenu.style.maxHeight = submenu.scrollHeight + 'px';
                        }
                    });
                });
            });
        </script>
    </body>
</html>