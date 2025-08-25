#
# Table structure for table 'tx_sahiv_domain_model_article'
#
CREATE TABLE tx_sahiv_domain_model_article (
    title varchar(255) DEFAULT '' NOT NULL,
    acronym varchar(255) DEFAULT '' NOT NULL,
    archived int(11) DEFAULT 0 NOT NULL,
    type int(11) DEFAULT 0 NOT NULL,
    colors int(11) DEFAULT 0 NOT NULL,
    material int(11) DEFAULT 0 NOT NULL,
    size float(11) DEFAULT 0 NOT NULL,
    images text
);

#
# Table structure for table 'tx_sahiv_domain_model_color'
#
CREATE TABLE tx_sahiv_domain_model_color (
    title varchar(255) DEFAULT '' NOT NULL,
    articles int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_material'
#
CREATE TABLE tx_sahiv_domain_model_material (
    title varchar(255) DEFAULT '' NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_order'
#
CREATE TABLE tx_sahiv_domain_model_order (
    title varchar(255) DEFAULT '' NOT NULL,
    article int(11) DEFAULT 0 NOT NULL,
    pack_amount int(11) DEFAULT 0 NOT NULL,
    pack_price float(11) DEFAULT 0 NOT NULL,
    pieces_per_pack int(11) DEFAULT 0 NOT NULL,
    bought_at varchar(255) DEFAULT '' NOT NULL,
    shop_name varchar(255) DEFAULT '' NOT NULL,
    shop_link varchar(255) DEFAULT '' NOT NULL,
    is_only_adjustment tinyint DEFAULT 0 NOT NULL,
    adjustment_type tinyint DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_product'
#
CREATE TABLE tx_sahiv_domain_model_product (
    title varchar(255) DEFAULT '' NOT NULL,
    acronym varchar(255) DEFAULT '' NOT NULL,
    productcomponents int(11) DEFAULT 0 NOT NULL,
    is_bought tinyint DEFAULT 0,
    type int(11) DEFAULT 0 NOT NULL,
    colors int(11) DEFAULT 0 NOT NULL,
    size float(11) DEFAULT 0 NOT NULL,
    selling_price float(11) DEFAULT 0 NOT NULL,
    working_hours float(11) DEFAULT 0 NOT NULL,
    crafted_at varchar(255) DEFAULT '' NOT NULL,
    images text
);

#
# Table structure for table 'tx_sahiv_domain_model_productcomponent'
#
CREATE TABLE tx_sahiv_domain_model_productcomponent (
    uid int(11) NOT NULL AUTO_INCREMENT,
    parent int(11) DEFAULT 0 NOT NULL,
    article int(11) DEFAULT 0 NOT NULL,
    used_amount int(11) DEFAULT 0 NOT NULL,
    PRIMARY KEY (uid)
);

#
# Table structure for table 'tx_sahiv_domain_model_type'
#
CREATE TABLE tx_sahiv_domain_model_type (
    title varchar(255) DEFAULT '' NOT NULL,
    is_type_for tinyint DEFAULT 0 NOT NULL
);



#
# Table structure for table 'tx_sahiv_domain_model_pearl'
#
CREATE TABLE tx_sahiv_domain_model_pearl (
    title varchar(255) DEFAULT '' NOT NULL,
    acronym varchar(255) DEFAULT '' NOT NULL,
    images text,
    unit_price DECIMAL(10,2) DEFAULT 0 NOT NULL,
    stock int(11) DEFAULT 0 NOT NULL,
    size DECIMAL(10,2) DEFAULT 0 NOT NULL,
    colorscp int(11) DEFAULT 0 NOT NULL,
    colortones int(11) DEFAULT 0 NOT NULL,
    materialscp int(11) DEFAULT 0 NOT NULL,
    shapes int(11) DEFAULT 0 NOT NULL,
    archived tinyint DEFAULT 0 NOT NULL,
    deleted tinyint DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_colorcp'
#
CREATE TABLE tx_sahiv_domain_model_colorcp (
    title varchar(255) DEFAULT '' NOT NULL,
    pearls int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_colortone'
#
CREATE TABLE tx_sahiv_domain_model_colortone (
    title varchar(255) DEFAULT '' NOT NULL,
    pearls int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_materialcp'
#
CREATE TABLE tx_sahiv_domain_model_materialcp (
    title varchar(255) DEFAULT '' NOT NULL,
    pearls int(11) DEFAULT 0 NOT NULL
);

#
# Table structure for table 'tx_sahiv_domain_model_shape'
#
CREATE TABLE tx_sahiv_domain_model_shape (
    title varchar(255) DEFAULT '' NOT NULL,
    pearls int(11) DEFAULT 0 NOT NULL
);
