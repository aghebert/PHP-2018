<main class="h1">Site Link Lister</main>

<section>
    <form class="dropdown" method='get' action='./index.php'>
        <label for='websiteURL'>Search Website: </label>
        <select id='websiteURL' name="id">
            <?php foreach ($fetchedURLS as $fetchedURL): ?>
                <option value="<?= $fetchedURL['site_id']; ?>"><?= $fetchedURL['site']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Get Websites">
        <input type='hidden' name='action' value='Fetch' />
        <input type='submit' name='action' value='Reset' />
    </form>

</section>

