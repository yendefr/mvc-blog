</td>

<td width="300px" class="sidebar">
    <div class="sidebarHeader">Меню</div>
    <ul>
        <li><a href="/">Главная страница</a></li>
        <li><a href="add" target="">Добавить статью</a></li>
      <br>
        <li><a href="https://github.com/defor-dev" target="_blank">Обо мне</a></li>
    </ul>
</td>
</tr>
<?php
// Комментарии отображаются только на странице статьи
$id = isset($article) ? $article->getId() : '';

if ($_SERVER['REQUEST_URI'] == 'articles/'.$id)
{
    include __DIR__ . '/comments/add.php';
    include __DIR__ . '/comments/view.php';
}
?>
<tr>
    <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
</tr>
</table>

</body>
</html>