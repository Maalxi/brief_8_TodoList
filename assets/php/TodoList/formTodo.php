<form action='./pageTodo.php' method="POST">
    <div class="titre">
        <label for="ADD">Ajoutez</label>
    </div>
    <div class="input-container">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="input-container">
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
    </div>

    <div class="input-container">
        <label for="important">Important</label>
        <input type="checkbox" name="important" id="important">
    </div>
    <input type="submit" value="Enregistrer">
</form>