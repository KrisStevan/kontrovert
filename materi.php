<html>
	<head>
        <script src="global-layout.js" defer></script>
        <global-header></global-header>
	</head>
    <body>
        <script src="myscripts.js"></script>

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

                            $idTopic = isset($_GET['id']) ? (int) $_GET['id'] : 0; //match the topic (in url = id)

                            $sqlstr = 'SELECT id, name, topics_id FROM materials WHERE topics_id = ' . $idTopic . ' ORDER BY name ASC';
                            $result = mysqli_query($db, $sqlstr);

                            if ($result && mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $id = (int) $row['id']; //match the material article (in url = article)
                                    $namaTopik = htmlspecialchars($row['name'], ENT_QUOTES, 'UTF-8');
                                    $topicUrl = 'materi.php?id=' . $idTopic;

                                    //articles per material
                                    $sqlstr2 = 'SELECT id, judul FROM articles WHERE idMateri = ' . $id . ' ORDER BY judul ASC';
                                    $result2 = mysqli_query($db, $sqlstr2);

                                    //left menubar here
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
                            } 
                            else {
                                echo '<li><a href="#">Tidak ada materi</a></li>';
                            }
                        ?>
                    </ul>
                </div>

                <!--right side-->
                <div class="hero-inner-main">
                    <div class="hero-cta">
                        <?php
                            if (isset($_GET['article'])) {
                                $articleId = (int) $_GET['article'];
                                $sqlstr3 = 'SELECT gambar, judul, isi, sumber, created_by FROM articles WHERE id = ' . $articleId;
                                $result3 = mysqli_query($db, $sqlstr3);

                                if ($result3 && mysqli_num_rows($result3) > 0) {
                                    $row3 = mysqli_fetch_assoc($result3);
                                    // keep title and source escaped for safe attributes/text
                                    $articleTitle = htmlspecialchars($row3['judul'], ENT_QUOTES, 'UTF-8');
                                    $articleSource = htmlspecialchars($row3['sumber'], ENT_QUOTES, 'UTF-8');
                                    $createdBy = htmlspecialchars($row3['created_by'], ENT_QUOTES, 'UTF-8');

                                    // image filename stored in DB; resolve correct public path if file exists
                                    $articleImageRaw = $row3['gambar'];
                                    $imgPath = '';
                                    if (!empty($articleImageRaw)) {
                                        $candidate1 = __DIR__ . '/Images/' . $articleImageRaw;
                                        $candidate2 = __DIR__ . '/Images/Materi/' . $articleImageRaw;
                                        if (file_exists($candidate1)) {
                                            $imgPath = 'Images/' . $articleImageRaw;
                                        } elseif (file_exists($candidate2)) {
                                            $imgPath = 'Images/Materi/' . $articleImageRaw;
                                        }
                                    }

                                    // article content may include HTML from the editor; do not escape here so tags render
                                    $articleContent = $row3['isi'];

                                    echo '<h2 class="page-title">' . $articleTitle . '</h2>';
                                }
                            }
                            else{
                                echo '<h2 class="page-title">Materi</h2>';
                            }
                        
                            //show article content if article id is provided
                            if (isset($_GET['article'])) {
                                if ($result3 && mysqli_num_rows($result3) > 0) {
                                    echo '<div class="article-detail">
                                            <div class="hero-inner-size-buttons">
                                                <button type="button" id="perkecilGDB" onclick="perkecilGDB()">←</button>
                                                <button type="button" id="perbesarGDB" onclick="perbesarGDB()">→</button>
                                                <button type="button" id="pertinggiGDB" onclick="pertinggiGDB()">↑</button>
                                                <button type="button" id="perendahGDB" onclick="perendahGDB()">↓</button>
                                            </div>

                                            ' . (!empty($imgPath) ? '<img src="' . htmlspecialchars($imgPath, ENT_QUOTES, 'UTF-8') . '" id="gambarDB" alt="' . $articleTitle . '">' : '') . '
                                            <div class="article-text">
                                                ' . $articleContent . ' 
                                                <br><br>
                                                <p><strong>Edited By:</strong> ' . $createdBy . '</p>
                                                <p><strong>Sumber:</strong> ' . $articleSource . '</p>
                                            </div>
                                        </div>';
                                } 
                            }
                            else 
                            {
                                echo '<p>Selamat datang di halaman materi. Silakan pilih topik dari menu di sebelah kiri untuk melihat materi yang tersedia.</p>';
                            }
                            mysqli_close($db);
                        ?>
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