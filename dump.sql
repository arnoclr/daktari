--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.19
-- Dumped by pg_dump version 9.6.17

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: daktari; Type: SCHEMA; Schema: -; Owner: arno.cellarier
--

CREATE SCHEMA daktari;


ALTER SCHEMA daktari OWNER TO "arno.cellarier";

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: animaux; Type: TABLE; Schema: daktari; Owner: arno.cellarier
--

CREATE TABLE daktari.animaux (
    id integer NOT NULL,
    nom character varying(25),
    espece character varying(25),
    race character varying(25),
    taille_cm integer,
    genre character(1),
    castre boolean,
    poids smallint,
    id_proprietaire integer NOT NULL,
    image character varying(75)
);


ALTER TABLE daktari.animaux OWNER TO "arno.cellarier";

--
-- Name: animaux_id_proprietaire_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.animaux_id_proprietaire_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.animaux_id_proprietaire_seq OWNER TO "arno.cellarier";

--
-- Name: animaux_id_proprietaire_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.animaux_id_proprietaire_seq OWNED BY daktari.animaux.id_proprietaire;


--
-- Name: animaux_id_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.animaux_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.animaux_id_seq OWNER TO "arno.cellarier";

--
-- Name: animaux_id_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.animaux_id_seq OWNED BY daktari.animaux.id;


--
-- Name: consultations; Type: TABLE; Schema: daktari; Owner: arno.cellarier
--

CREATE TABLE daktari.consultations (
    id integer NOT NULL,
    raison character varying(255),
    date timestamp without time zone,
    duree_minutes smallint,
    resume_manipulations text,
    tarif_centimes integer,
    id_animal integer NOT NULL
);


ALTER TABLE daktari.consultations OWNER TO "arno.cellarier";

--
-- Name: consultations_id_animal_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.consultations_id_animal_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.consultations_id_animal_seq OWNER TO "arno.cellarier";

--
-- Name: consultations_id_animal_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.consultations_id_animal_seq OWNED BY daktari.consultations.id_animal;


--
-- Name: consultations_id_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.consultations_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.consultations_id_seq OWNER TO "arno.cellarier";

--
-- Name: consultations_id_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.consultations_id_seq OWNED BY daktari.consultations.id;


--
-- Name: produits; Type: TABLE; Schema: daktari; Owner: arno.cellarier
--

CREATE TABLE daktari.produits (
    id integer NOT NULL,
    nom character varying(25),
    marque character varying(25),
    image character varying(75)
);


ALTER TABLE daktari.produits OWNER TO "arno.cellarier";

--
-- Name: produits_id_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.produits_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.produits_id_seq OWNER TO "arno.cellarier";

--
-- Name: produits_id_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.produits_id_seq OWNED BY daktari.produits.id;


--
-- Name: proprietaires; Type: TABLE; Schema: daktari; Owner: arno.cellarier
--

CREATE TABLE daktari.proprietaires (
    id integer NOT NULL,
    nom character varying(25),
    adresse character varying(120),
    tel character(10),
    email character varying(70),
    role smallint DEFAULT 0
);


ALTER TABLE daktari.proprietaires OWNER TO "arno.cellarier";

--
-- Name: proprietaires_id_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.proprietaires_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.proprietaires_id_seq OWNER TO "arno.cellarier";

--
-- Name: proprietaires_id_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.proprietaires_id_seq OWNED BY daktari.proprietaires.id;


--
-- Name: traitements; Type: TABLE; Schema: daktari; Owner: arno.cellarier
--

CREATE TABLE daktari.traitements (
    id integer NOT NULL,
    frequence_journaliere smallint,
    dose_ml integer,
    duree_jours smallint,
    dillution_pourcentage smallint,
    id_consultation integer NOT NULL,
    id_produit integer NOT NULL
);


ALTER TABLE daktari.traitements OWNER TO "arno.cellarier";

--
-- Name: traitements_id_consultation_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.traitements_id_consultation_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.traitements_id_consultation_seq OWNER TO "arno.cellarier";

--
-- Name: traitements_id_consultation_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.traitements_id_consultation_seq OWNED BY daktari.traitements.id_consultation;


--
-- Name: traitements_id_produit_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.traitements_id_produit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.traitements_id_produit_seq OWNER TO "arno.cellarier";

--
-- Name: traitements_id_produit_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.traitements_id_produit_seq OWNED BY daktari.traitements.id_produit;


--
-- Name: traitements_id_seq; Type: SEQUENCE; Schema: daktari; Owner: arno.cellarier
--

CREATE SEQUENCE daktari.traitements_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE daktari.traitements_id_seq OWNER TO "arno.cellarier";

--
-- Name: traitements_id_seq; Type: SEQUENCE OWNED BY; Schema: daktari; Owner: arno.cellarier
--

ALTER SEQUENCE daktari.traitements_id_seq OWNED BY daktari.traitements.id;


--
-- Name: animaux id; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.animaux ALTER COLUMN id SET DEFAULT nextval('daktari.animaux_id_seq'::regclass);


--
-- Name: animaux id_proprietaire; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.animaux ALTER COLUMN id_proprietaire SET DEFAULT nextval('daktari.animaux_id_proprietaire_seq'::regclass);


--
-- Name: consultations id; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.consultations ALTER COLUMN id SET DEFAULT nextval('daktari.consultations_id_seq'::regclass);


--
-- Name: consultations id_animal; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.consultations ALTER COLUMN id_animal SET DEFAULT nextval('daktari.consultations_id_animal_seq'::regclass);


--
-- Name: produits id; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.produits ALTER COLUMN id SET DEFAULT nextval('daktari.produits_id_seq'::regclass);


--
-- Name: proprietaires id; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.proprietaires ALTER COLUMN id SET DEFAULT nextval('daktari.proprietaires_id_seq'::regclass);


--
-- Name: traitements id; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.traitements ALTER COLUMN id SET DEFAULT nextval('daktari.traitements_id_seq'::regclass);


--
-- Name: traitements id_consultation; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.traitements ALTER COLUMN id_consultation SET DEFAULT nextval('daktari.traitements_id_consultation_seq'::regclass);


--
-- Name: traitements id_produit; Type: DEFAULT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.traitements ALTER COLUMN id_produit SET DEFAULT nextval('daktari.traitements_id_produit_seq'::regclass);


--
-- Name: animaux animaux_pkey; Type: CONSTRAINT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.animaux
    ADD CONSTRAINT animaux_pkey PRIMARY KEY (id);


--
-- Name: consultations consultations_pkey; Type: CONSTRAINT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.consultations
    ADD CONSTRAINT consultations_pkey PRIMARY KEY (id);


--
-- Name: produits produits_pkey; Type: CONSTRAINT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.produits
    ADD CONSTRAINT produits_pkey PRIMARY KEY (id);


--
-- Name: proprietaires proprietaires_pkey; Type: CONSTRAINT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.proprietaires
    ADD CONSTRAINT proprietaires_pkey PRIMARY KEY (id);


--
-- Name: traitements traitements_pkey; Type: CONSTRAINT; Schema: daktari; Owner: arno.cellarier
--

ALTER TABLE ONLY daktari.traitements
    ADD CONSTRAINT traitements_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

