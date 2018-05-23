
<main class="h1">Site Link Lister</main>

<section><form class="dropdown" method='get' action='./index.php'>
        <label for='websiteURL'>Search Website: </label>
        <select name='websiteURL' id='websiteURL'>
            <?php foreach($fetchedURLS as $fetchedURL): ?>
                <option value="<?= $fetchedURL['site_id']; ?>"><?= $fetchedURL['site']; ?></option>
            <?php endforeach; ?>
        </select>
    </form></section>

