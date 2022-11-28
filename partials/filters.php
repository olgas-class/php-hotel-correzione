<form action="index.php" method="GET">
    <div class="mb-2">
        <label for="parking">Parcheggio</label>
        <select class="form-select mb-3" name="parking" id="parking">
            <option value="">Tutti</option>
            <option value="1">Con parcheggio</option>
        </select>
    </div>
    <div class="mb-2">
        <label for="vote">Voto minimo</label>
        <select class="form-select mb-3" name="vote" id="vote">
            <option value="">Tutti</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary" type="submit">Filtra</button>
        <button class="btn btn-secondary" type="reset">Annulla</button>
    </div>
</form>