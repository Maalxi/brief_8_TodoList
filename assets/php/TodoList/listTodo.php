<table>
    <tr>
        <th>Delete</th>
        <th>Titre</th>
        <th>Description</th>
        <th>Important</th>
    </tr>
    <?php 
        foreach ($allTodoList as $todo_list){
            $removeUrl = 'delete=' . $todo_list->getId();
            $removeLink = '<a href="./pageTodo.php?' . $removeUrl . '"><img class="button-delete" src="../../img/Capture_decran_du_2023-04-27_13-31-15.png" alt=""></a>';

            echo ('<tr>');
            echo ('<td>' . $removeLink . '</td>');
            echo ('<td>'. $todo_list->getTitle(). '</td>');
            echo ('<td>'. $todo_list->getDescription(). '</td>');
            echo ('<td>'. $todo_list->getImportant(). '</td>');
            echo ('</tr>');
        }
    ?>
</table>