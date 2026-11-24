USE `aulatech`;
SET NAMES utf8mb4;

-- Cabecera: quién compra y cuándo.
CREATE TABLE `purchases` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` INT UNSIGNED NOT NULL,
    `purchase_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_purchases_user_date` (`user_id`, `purchase_date`),
    CONSTRAINT `fk_purchases_user`
        FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
        ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Detalle: cada artículo aparece una sola vez por compra, con su cantidad.
CREATE TABLE `purchase_articles` (
    `purchase_id` INT UNSIGNED NOT NULL,
    `article_id` INT UNSIGNED NOT NULL,
    `quantity` INT UNSIGNED NOT NULL,
    `unit_price` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`purchase_id`, `article_id`),
    KEY `idx_purchase_articles_article` (`article_id`),
    CONSTRAINT `chk_purchase_articles_quantity` CHECK (`quantity` > 0),
    CONSTRAINT `chk_purchase_articles_price` CHECK (`unit_price` >= 0),
    CONSTRAINT `fk_purchase_articles_purchase`
        FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`)
        ON DELETE CASCADE ON UPDATE RESTRICT,
    CONSTRAINT `fk_purchase_articles_article`
        FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
        ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

START TRANSACTION;

INSERT INTO `purchases` (`id`, `user_id`, `purchase_date`) VALUES
(1, 3, '2026-10-10 09:30:00'),
(2, 4, '2026-10-11 10:30:00'),
(3, 5, '2026-10-12 11:30:00'),
(4, 6, '2026-10-13 12:30:00'),
(5, 7, '2026-10-14 13:30:00'),
(6, 8, '2026-10-15 14:30:00'),
(7, 9, '2026-10-16 15:30:00'),
(8, 10, '2026-10-17 09:30:00'),
(9, 11, '2026-10-18 10:30:00'),
(10, 12, '2026-10-19 11:30:00'),
(11, 13, '2026-10-20 12:30:00'),
(12, 14, '2026-10-21 13:30:00'),
(13, 3, '2026-10-22 14:30:00'),
(14, 4, '2026-10-23 15:30:00'),
(15, 5, '2026-10-24 09:30:00'),
(16, 6, '2026-10-25 10:30:00'),
(17, 7, '2026-10-26 11:30:00'),
(18, 8, '2026-10-27 12:30:00'),
(19, 9, '2026-10-28 13:30:00'),
(20, 10, '2026-10-29 14:30:00');

INSERT INTO `purchase_articles` (`purchase_id`, `article_id`, `quantity`, `unit_price`) VALUES
(1, 2, 1, 24.93),
(1, 7, 2, 9.08),
(1, 10, 3, 13.79),
(2, 21, 2, 33.19),
(2, 23, 3, 335.41),
(2, 27, 1, 9.22),
(3, 30, 3, 7.84),
(3, 42, 1, 83.73),
(3, 43, 2, 286.91),
(4, 48, 1, 138.36),
(4, 50, 2, 13.64),
(4, 62, 3, 22.89),
(5, 67, 2, 28.88),
(5, 81, 3, 116.55),
(5, 87, 1, 10.05),
(6, 102, 3, 79.77),
(6, 107, 1, 15.42),
(6, 122, 2, 66.04),
(7, 127, 1, 38.79),
(7, 143, 2, 148.42),
(7, 2, 3, 26.24),
(8, 7, 2, 9.56),
(8, 10, 3, 14.52),
(8, 21, 1, 33.19),
(9, 23, 3, 318.64),
(9, 27, 1, 8.76),
(9, 30, 2, 7.45),
(10, 42, 1, 83.73),
(10, 43, 2, 286.91),
(10, 48, 3, 138.36),
(11, 50, 2, 13.64),
(11, 62, 3, 22.89),
(11, 67, 1, 30.40),
(12, 81, 3, 122.68),
(12, 87, 1, 10.58),
(12, 102, 2, 79.77),
(13, 107, 1, 14.65),
(13, 122, 2, 62.74),
(13, 127, 3, 36.85),
(14, 143, 2, 148.42),
(14, 2, 3, 26.24),
(14, 7, 1, 9.56),
(15, 10, 3, 14.52),
(15, 21, 1, 33.19),
(15, 23, 2, 335.41),
(16, 27, 1, 9.22),
(16, 30, 2, 7.84),
(16, 42, 3, 83.73),
(17, 43, 2, 272.56),
(17, 48, 3, 131.44),
(17, 50, 1, 12.96),
(18, 62, 3, 22.89),
(18, 67, 1, 30.40),
(18, 81, 2, 122.68),
(19, 87, 1, 10.58),
(19, 102, 2, 79.77),
(19, 107, 3, 15.42),
(20, 122, 2, 66.04),
(20, 127, 3, 38.79),
(20, 143, 1, 148.42);

COMMIT;

-- CONSULTAS DE PRÁCTICA (comentadas: no se ejecutan durante la importación).

-- 1. Listado de compras, persona compradora y total calculado.
-- SELECT p.id, p.purchase_date, u.username, u.full_name,
--        SUM(pa.quantity * pa.unit_price) AS total
-- FROM purchases AS p
-- INNER JOIN users AS u ON u.id = p.user_id
-- INNER JOIN purchase_articles AS pa ON pa.purchase_id = p.id
-- GROUP BY p.id, p.purchase_date, u.username, u.full_name
-- ORDER BY p.purchase_date DESC, p.id DESC;

-- 2. Detalle de la compra 1 y comparación con el precio actual.
-- SELECT a.id, a.name, pa.quantity, pa.unit_price,
--        a.price AS current_price,
--        pa.quantity * pa.unit_price AS subtotal
-- FROM purchase_articles AS pa
-- INNER JOIN articles AS a ON a.id = pa.article_id
-- WHERE pa.purchase_id = 1
-- ORDER BY a.id;

-- 3. Compras del usuario 3 (en PHP se parametriza el identificador).
-- SELECT id, purchase_date FROM purchases
-- WHERE user_id = 3 ORDER BY purchase_date DESC, id DESC;

-- 4. Comprobar la carga: debe devolver 20 compras y 60 líneas.
-- SELECT COUNT(*) AS total_purchases FROM purchases;
-- SELECT COUNT(*) AS total_lines FROM purchase_articles;

-- DISEÑO
-- Un usuario puede tener varias compras; una compra pertenece a un usuario.
-- Una compra contiene varios artículos y un artículo aparece en varias compras.
-- La PK compuesta evita repetir el mismo artículo dentro de una misma compra.
-- Para comprar varias unidades se modifica quantity, no se duplica la línea.
-- El total no se almacena: SUM(quantity * unit_price) lo calcula desde el detalle.
-- Se conserva unit_price aunque después cambie articles.price.
-- RESTRICT impide borrar usuarios o artículos que tengan compras asociadas.
-- CASCADE elimina las líneas si se elimina explícitamente la compra.
-- Las futuras compras y su descuento de stock deben registrarse en una transacción.