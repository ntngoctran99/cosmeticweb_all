CREATE TABLE `subscribers`
(
    `id`         int(11) NOT NULL,
    `email`      varchar(255) NOT NULL,
    `created_at` timestamp    NOT NULL DEFAULT current_timestamp(),
    `updated_at` timestamp    NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
