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
    '12356789',
    'Привет! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
(
    'man.png',
    'Денис',
    'Иванов',
    'some_random_email@email.moc',
    '123512455',
    'Привет!! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
    'ava.png',
    'Денислав',
    'Иваненко',
    'some_random_email@email.moc',
    '1235',
    'Привет!!! Я системный аналитик в ACME :) Тут моя жизнь только для самых классных!'
),
(
        'ava.png',
        'Пётр',
        'Жданов',
        'anatolijkovyralo@gmail.com',
        '12356',
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