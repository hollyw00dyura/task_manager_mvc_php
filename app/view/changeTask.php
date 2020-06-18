<h1>Изменение таска</h1>
<p>
    Изменить таск
    <?php
        $login = Registry::get('login');
        $admin = Registry::get('$admin');
        if ($login !== null && $admin === 1) {
            $message_update_task = Registry::get('message_update_task');
            echo $message_update_task.'<br>';
            // id - айди таска в базе, надо скрывать его, но передавать в экшене changeTask и в экшене doneTask
            echo 'Имя пользователя: '.$data['name'].'<br>'; // name = name_user;
            echo 'email: '.$data['email'].'<br>'; // name = email;
            echo $data['text'].'<br><br>'; // name = text;
            // тут кнопка "Выполнено"
            //      нажатие экшен doneTask
            if ($data['flag_done'] === 0)
                echo 'Кнопка "Выполнено"<br>';
            // тут кнопка "Сохранить изменения"
            //      нажатие экшен changeTask - произойдет переход на страницу с тасками
            echo 'Кнопка "Сохранить изменения"<br>';
            // тут кнопка "Вурнуться"
            //      нажатие экшен back
            echo 'Кнопка "Вурнуться"<br>';
        } else {
            // надо перенаправить на стартовую страницу
        }
    ?>

</p>