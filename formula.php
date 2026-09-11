<?php
    include "db.inc.php";
    connect_db($db);

    $search = isset($_GET['q']) ? trim($_GET['q']) : '';
    $topic_id = isset($_GET['topic_id']) ? (int) $_GET['topic_id'] : 0;
    $topics = [];
    $topicResult = mysqli_query($db, 
                    "SELECT DISTINCT f.topic_id, t.namaTopik
                     FROM formulas f JOIN topics t ON f.topic_id = t.id
                    WHERE f.topic_id IS NOT NULL AND f.topic_id <> '' ORDER BY t.namaTopik ASC");

    if ($topicResult) {
        while ($topicRow = mysqli_fetch_assoc($topicResult)) {
            $topics[] = $topicRow;
        }
    }

    //formula data
    $sqlstr = "SELECT f.*, t.namaTopik 
                FROM formulas f JOIN topics t ON f.topic_id = t.id ";

    $conditions = [];
    $types = '';
    $values = [];

    if ($search !== '') {
        $conditions[] = "(f.formula_title LIKE ? OR f.formula_value LIKE ? OR f.explanation LIKE ? OR t.namaTopik LIKE ? )";
        $searchValue = '%' . $search . '%';
        $types .= 'ssss';
        $values[] = $searchValue;
        $values[] = $searchValue;
        $values[] = $searchValue;
        $values[] = $searchValue;
    }

    if ($topic_id > 0) {
        $conditions[] = "f.topic_id = ?";
        $types .= 'i';
        $values[] = $topic_id;
    }

    if ($conditions) {
        $sqlstr .= " WHERE " . implode(' AND ', $conditions);
    }
    $sqlstr .= " ORDER BY f.formula_title";

    $statement = mysqli_prepare($db, $sqlstr);
    if ($types !== '') {
        mysqli_stmt_bind_param($statement, $types, ...$values);
    }
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);

    function formula_escape($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="global-layout.js" defer></script>
        <global-header></global-header>

        <!-- KaTeX CSS -->
        <link rel="stylesheet" href="katex/katex.min.css">

        <style>
            .detail-news{
                display: flex;
                width: 100%;
                align-items: stretch;
                flex-direction: column;
            }

            .hero p {
                margin: 0px 0px 0px;
                color: #444;
            }

            .detail-row {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding: 1rem 1.2rem;
                border-radius: 18px;
                border: 1px solid #e2e8f0;
                background: #ffffff;
                flex-direction: row;
                flex-wrap: wrap;
                margin-bottom: 1%;
            }

            .formula-page{
                max-width:1000px;
                margin:0 auto;
            }

            .formula-filters{
                display:flex;
                flex-wrap:wrap;
                gap:10px;
                margin:0 auto 24px;
                padding:16px;
                background:var(--surface);
                border:1px solid var(--border);
                border-radius:12px;
                box-shadow:0 8px 20px var(--shadow);
            }
            .formula-filters input,.formula-filters select{
                flex:1 1 220px;
                min-width:0;
                padding:10px 12px;
                border:1px solid var(--border);
                border-radius:6px;
                font:inherit;
                color:var(--text);
                background:#fff
            }
            .formula-filters button{
                padding:10px 18px;
                border:0;
                border-radius:6px;
                background:var(--crimson);
                color:#fff;
                font:inherit;
                font-weight:700;
                cursor:pointer
            }
            .formula-filters button:hover{
                background:var(--crimson-dark)
            }
        </style>
    </head>
    <body>
        <!--bagian untuk isinya -->
		<main class="hero" role="main">
            <div class="hero-inner formula-page">
                <header class="glossary-intro">
                    <h1 class="page-title">Collection of Formulas</h1>
                </header>

                <!--search formulas-->
                <form class="formula-filters" method="get" action="formula.php">
                    <input type="text" id="formula-search" name="q" placeholder="Search formulas..." 
                        value="<?= isset($_GET['q']) ? htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8') : '' ?>">
                    
                    <select id="glossary-topic" name="topic_id">
                        <option value="">Pilih topik</option>
                        <?php foreach ($topics as $availableTopic): ?>
                            <option value="<?php echo (int) $availableTopic['topic_id']; ?>" 
                                <?php echo $topic_id === (int) $availableTopic['topic_id'] ? 'selected' : ''; ?> >
                                <?php echo formula_escape($availableTopic['namaTopik']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Cari</button>
                </form>

                <section class="formula-list" aria-live="polite">
                    <?php 
                        if (!$result || mysqli_num_rows($result) === 0){
                            echo "<p class=\"glossary-empty\">Formula is unavailable</p>";
                        }
                        else{
                            while ($row = mysqli_fetch_assoc($result)) {
                                // 2. Define your formulas in PHP using LaTeX syntax
                                // Use $$ for block formulas (centered on their own line)
                                // Use \( ... \) for inline formulas (inside text)
                                $id = $row['id'];
                                $formula_title = htmlspecialchars($row['formula_title'], ENT_QUOTES, 'UTF-8');
                                $formula_value = '$$ '. $row['formula_value'] . ' $$'; // ^ = to the power of
                                $explanation = htmlspecialchars($row['explanation'], ENT_QUOTES, 'UTF-8');
                            
                                // Display each formula
                                echo "<div class='detail-row'>";
                                    echo "<div class='detail-news'>";
                                        echo "<h2>" . htmlspecialchars($row['formula_title'], ENT_QUOTES, 'UTF-8') . "</h2>";
                                        echo "<p>" . htmlspecialchars($row['explanation'], ENT_QUOTES, 'UTF-8') . "</p>";
                                        echo "<p>$$ " . $row['formula_value'] . " $$</p>";

                                        //symbols explanations
                                        echo "<strong>Symbol Explanations:</strong>";
                                        $sqlstrexp = "SELECT symbol, meaning, description FROM symbols WHERE formula_id = " . $id;
                                        $resultexp = mysqli_query($db, $sqlstrexp);

                                        while ($exp_row = mysqli_fetch_assoc($resultexp)) {
                                            $symbol = htmlspecialchars($exp_row['symbol'], ENT_QUOTES, 'UTF-8');
                                            $meaning = htmlspecialchars($exp_row['meaning'], ENT_QUOTES, 'UTF-8');
                                            $description = htmlspecialchars($exp_row['description'], ENT_QUOTES, 'UTF-8');

                                            echo "<p><strong>" . $symbol . ":</strong> " . $description . " - " . $meaning . "</p>";
                                        }
                                    echo "</div>";
                                echo "</div>";
                            }
                        }
                    ?>
                </section>
            </div>
        </main>

        <footer id="footer" class="site-footer">
			<global-footer></global-footer>
		</footer>

        <!-- KaTeX -->
        <script src="katex/katex.min.js"></script>
        <script src="katex/contrib/auto-render.min.js"></script>

        <!-- Initialize KaTeX -->
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                renderMathInElement(document.body, {
                    delimiters: [
                        {left: "$$", right: "$$", display: true},
                        {left: "\\(", right: "\\)", display: false},
                        {left: "\\[", right: "\\]", display: true}
                    ]
                });
            });
        </script>
    </body>
</html>