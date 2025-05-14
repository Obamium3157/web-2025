INSERT INTO
    post (
        user_id,
        image,
        text
    )
VALUES (
    '1',
    'elgato.png',
    'Hello, world!'
),
(
    '2',
    'meme.png',
    'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Pariatur quibusdam consequuntur atque quia cumque voluptas obcaecati minima eveniet. Suscipit, magnam? Ipsam veniam fuga deleniti voluptatem! Animi dolorem quas repellat nostrum!'
),
(
    '3',
    'truth.png',
    'helo! I am the most average person possible :P'
),
(
    '1',
    'peter.png',
    'Hello, world!'
),
(
    '1',
    'peter.png',
    'Hello, world!'
),
(
    '1',
    'peter.png',
    'Hello, world!'
),
(
    '4',
    '1.png',
    'Hello, world!'
),
(
    '4',
    '2.png',
    'Hello, world!'
),
(
    '4',
    '3.png',
    'Hello, world!'
),
(
    '4',
    '4.png',
    'Hello, world!'
),
(
    '4',
    '5.png',
    'Hello, world!'
),
(
    '4',
    '6.png',
    'Hello, world!'
),
(
    '4',
    '7.png',
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
(
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
    'peter.png',
    '1'
);