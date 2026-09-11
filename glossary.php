<?php
    include "db.inc.php";
    connect_db($db);

    $search = isset($_GET['q']) ? trim($_GET['q']) : '';
    $topic = isset($_GET['topic']) ? (int) $_GET['topic'] : 0;
    $topics = [];
    $topicResult = mysqli_query($db, 
                    "SELECT DISTINCT g.topic, t.namaTopik
                     FROM glossary g JOIN topics t ON g.topic = t.id
                    WHERE g.topic IS NOT NULL AND g.topic <> '' ORDER BY t.namaTopik ASC");

    if ($topicResult) {
        while ($topicRow = mysqli_fetch_assoc($topicResult)) {
            $topics[] = $topicRow;
        }
    }

    $query = "SELECT g.term, g.slug, g.definition, g.topic, g.related_page, g.source, t.namaTopik
            FROM glossary g Join topics t ON g.topic = t.id";

    $conditions = [];
    $types = '';
    $values = [];

    if ($search !== '') {
        $conditions[] = "(g.term LIKE ? OR g.definition LIKE ? OR t.namaTopik LIKE ? )";
        $searchValue = '%' . $search . '%';
        $types .= 'sss';
        $values[] = $searchValue;
        $values[] = $searchValue;
        $values[] = $searchValue;
    }

    if ($topic > 0) {
        $conditions[] = "g.topic = ?";
        $types .= 'i';
        $values[] = $topic;
    }

    if ($conditions) {
        $query .= " WHERE " . implode(' AND ', $conditions);
    }
    $query .= " ORDER BY term ASC";

    $statement = mysqli_prepare($db, $query);
    if ($types !== '') {
        mysqli_stmt_bind_param($statement, $types, ...$values);
    }
    mysqli_stmt_execute($statement);
    $glossaryResult = mysqli_stmt_get_result($statement);

    function glossary_escape($value) {
        return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
    }
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <script src="global-layout.js" defer></script>
        <global-header></global-header>
        <style>
            .glossary-page{max-width:1000px;margin:0 auto}
            .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;border:0}
            .glossary-intro{text-align:center;margin-bottom:22px}
            .glossary-intro p{max-width:700px;margin:0 auto;color:var(--text-muted)}
            .glossary-filters{display:flex;flex-wrap:wrap;gap:10px;margin:0 auto 24px;padding:16px;background:var(--surface);border:1px solid var(--border);border-radius:12px;box-shadow:0 8px 20px var(--shadow)}
            .glossary-filters input,.glossary-filters select{flex:1 1 220px;min-width:0;padding:10px 12px;border:1px solid var(--border);border-radius:6px;font:inherit;color:var(--text);background:#fff}
            .glossary-filters button{padding:10px 18px;border:0;border-radius:6px;background:var(--crimson);color:#fff;font:inherit;font-weight:700;cursor:pointer}
            .glossary-filters button:hover{background:var(--crimson-dark)}
            .glossary-list{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}
            .glossary-entry{padding:20px;background:var(--surface);border:1px solid var(--border);border-left:4px solid var(--crimson);border-radius:10px;box-shadow:0 8px 20px var(--shadow)}
            .glossary-entry h2{margin:0 0 8px;color:var(--crimson-dark);font-size:22px}
            .glossary-topic{display:inline-block;margin-bottom:10px;color:var(--text-muted);font-size:13px;font-weight:700;text-transform:uppercase;letter-spacing:.06em}
            .glossary-entry p{margin:0;color:var(--text);line-height:1.7}
            .glossary-link{display:inline-block;margin-top:14px;font-weight:700}
            .glossary-source{margin-top:12px!important;color:var(--text-muted)!important;font-size:13px}
            .glossary-empty{grid-column:1/-1;padding:24px;text-align:center;background:var(--surface);border:1px solid var(--border);border-radius:10px;color:var(--text-muted)}
            @media (max-width:700px){.glossary-list{grid-template-columns:1fr}.glossary-entry{padding:16px}}
        </style>
    </head>
    <body>
        <main class="hero" role="main">
            <div class="hero-inner glossary-page">
                <header class="glossary-intro">
                    <h1 class="page-title">Science Glossaries</h1>
                </header>

                <form class="glossary-filters" method="get" action="glossary.php">
                    <label class="sr-only" for="glossary-search">Cari istilah</label>
                    <input id="glossary-search" type="search" name="q" value="<?php echo glossary_escape($search); ?>" placeholder="Cari istilah atau definisi...">
                    
                    <label class="sr-only" for="glossary-topic">Pilih topik</label>
                    <select id="glossary-topic" name="topic">
                        <option value="">Semua topik</option>
                        <?php foreach ($topics as $availableTopic): ?>
                            <option value="<?php echo (int) $availableTopic['topic']; ?>" 
                                <?php echo $topic === (int) $availableTopic['topic'] ? 'selected' : ''; ?> >
                                <?php echo glossary_escape($availableTopic['namaTopik']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit">Cari</button>
                </form>

                <section class="glossary-list" aria-live="polite">
                    <?php if (!$glossaryResult || mysqli_num_rows($glossaryResult) === 0): ?>
                        <p class="glossary-empty">Belum ada istilah yang sesuai dengan pencarianmu.</p>
                    <?php else: ?>
                        <?php while ($entry = mysqli_fetch_assoc($glossaryResult)): ?>
                            <article class="glossary-entry" id="<?php echo glossary_escape($entry['slug']); ?>">
                                <?php if ($entry['namaTopik'] !== null && $entry['namaTopik'] !== ''): ?>
                                    <span class="glossary-topic"><?php echo glossary_escape($entry['namaTopik']); ?></span>
                                <?php endif; ?>

                                <h2><?php echo glossary_escape($entry['term']); ?></h2>

                                <p><?php echo nl2br(glossary_escape($entry['definition'])); ?></p>

                                <?php if (!empty($entry['related_page'])): ?>
                                    <a class="glossary-link" href="<?php echo glossary_escape($entry['related_page']); ?>">Pelajari lebih lanjut</a>
                                <?php endif; ?>

                                <?php if (!empty($entry['source'])): ?>
                                    <p class="glossary-source">Sumber: <?php echo glossary_escape($entry['source']); ?></p>
                                <?php endif; ?>
                            </article>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </section>
            </div>
        </main>

        <footer id="footer" class="site-footer">
            <global-footer></global-footer>
        </footer>
    </body>
</html>
