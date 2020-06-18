<h1>Новый таск</h1>
<p>
        Новый таск
    <?php
        $login = Registry::get('login');
        if ($login !== null) {
            $message_new_task = Registry::get('message_new_task');
            echo $message_new_task.'<br>';
            echo 'Введите "Имя пользователя": <br>'; // name = name_user;
            echo 'Введите "email": <br>'; // name = email;
            echo 'Введите текст задачи<br><br>'; // name = text;
            // тут кнопка "Добавить задачу"
            //      нажатие экшен createNewTask - произойдет переход на страницу с тасками
            // тут кнопка "вернуться"
            //      нажатие экшен back
            echo 'Кнопка "Добавить задачу"<br>';
            echo 'Кнопка "Вернуться"<br>';
        } else {
            // надо перенаправить на стартовую страницу
        }
    ?>

</p>