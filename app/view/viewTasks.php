<h1>Таск Менеджер</h1>
<p>
    <?php
        $login = Registry::get('login');
        if ($login === null || $login = "") {
            // // Меню ввода логина и пароля (отображается если не был произведен вход).
            echo 'Логин: <br>'; // login
            echo 'Пароль: <br>'; // pass
            // Кнопка Вход
            //      нажатие экшен login
            echo 'Кнопка "Вход"<br>';
            // Кнопка Регистрация
            //      нажатие экшен register
            echo 'Кнопка "Регистрация"<br>';
            // Отображение текста неудачного входа
            $message_login = Registry::get('message_login') ?? "";
            echo $message_login."<br>";

            // Здесь же создание нового таска
            // Кнопка "Создать новую задачу"
            //      нажатие экшен newTask
            echo 'Кнопка "Создать новую задачу"<br>';
        } else {

            // Если был произведен вход:
            // Отображается логин.
            echo 'Логин: '.$login.'<br>';
            // Кнопка Выход.
            //      нажатие экшен close
            echo 'Кнопка "Выход"<br>';
        }

    echo '<table>';
        echo 'Страница с тасками';

        foreach ($data as $row) {
            $done = $row['flag_done'] ?? 0;
            if ($done === 0)
                $status = "Не выполнено";
            else
                $status = "Выполнено";
            // id задачи - не видимая часть
            echo '<tr><td>Имя пользователя: '.$row['name'].'<br>email: '.$row['email'].'<br>Статус:'.$status.'<br>'.$row['text'].'</td></tr>';

            $admin = Registry::get('$admin');
            if ($admin === 1) {
                // Кнопка "Редактировать" - видна только для админа
                //      нажатие экшен goChange - произойдет переход на страницу изменения задачи, передается id изменяемой задачи
                echo 'Кнопка "Редактировать"<br>';
                // Кнопка "Выполнено" - видна только для админа
                //      нажатие экшен doneTask
                if ($done === 0)
                    echo 'Кнопка "Выполнено"<br>';
            }
        }
        // Кнопки пагинации. Текущая страница не ввиде ссылки, остальные как ссылки. Ну или что-то аналогичное
        //      нажатие экшен page
        $showPage = (int)Registry::get('showPage');
        $pagination_array = Registry::get('pagination') ?? [1];
        foreach ($pagination_array as $key=>$valuePages) {
            if ($key !== 0) echo ' | ';
            if ($showPage === $valuePages)
                echo $valuePages; // не обозначаем ссылкой
            else
                echo $valuePages; // обозначаем ссылкой для возможности смены страницы
        }

    echo '</table>';
    ?>
</p>