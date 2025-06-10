INSERT INTO
    post (
        user_id,
        text
    )
VALUES ( /*1*/
    '1',
    'Hello, world!'
),
( /*2*/
    '2',
    'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur quibusdam consequuntur atque quia cumque voluptas obcaecati minima eveniet. Suscipit, magnam? Ipsam veniam fuga deleniti voluptatem! Animi dolorem quas repellat nostrum!'
),
( /*3*/
    '3',
    'helo! I am the most average person possible :P'
),
( /*4*/
    '1',
    'Hello, world!'
),
( /*5*/
    '4',
    'Hello, world!'
);

INSERT INTO
    user (
        profile_picture,
        first_name,
        last_name,
        email,
        password,
        description
    )
VALUES (
    'peter.png',
    'Ваня',
    'Денисов',
    'some_random_email@email.moc',
    '0393f61556c19b357ad2b63ef254a233',
    'Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
(
    'man.png',
    'Денис',
    'Иванов',
    'some_random_email1@email.moc',
    '8945e4d315c5aef51affb54dd4460811',
    'Привет!! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
(
    'ava.png',
    'Денислав',
    'Иваненко',
    'some_random_email3@email.moc',
    '6888157be8f085c450c95df4f251dbcf',
    'Привет!!! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
(
    'ava.png',
    'Пётр',
    'Жданов',
    'anatolijkovyralo@gmail.com',
    'db384e81c93b6937da8a438ff5183ead',
    'lorem ipsum'
);

INSERT INTO
    image (
        post_id,
        filename,
        idx
    )
VALUES (
    '1',
    'elgato.png',
    '0'
),
(
    '1',
    'peter.png',
    '1'
),
(
    '2',
    'meme.png',
    '0'

),
(
    '3',
    'truth.png',
    '0'
),
(
    '4',
    'peter.png',
    '0'
),
(
    '4',
    'peter.png',
    '1'
),
(
    '4',
    'peter.png',
    '2'
),
(
    '5',
    '1.png',
    '0'
),
(
    '5',
    '2.png',
    '1'
),
(
    '5',
    '3.png',
    '2'
),
(
    '5',
    '4.png',
    '3'
),
(
    '5',
    '5.png',
    '4'
),
(
    '5',
    '6.png',
    '5'
),
(
    '5',
    '7.png',
    '6'
);