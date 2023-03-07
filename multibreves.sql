--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

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

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: coches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.coches (
    id integer NOT NULL,
    marca character varying,
    modelo character varying,
    serie character varying,
    modificacion character varying,
    plazas integer,
    capacidad_carga integer,
    intercooler boolean
);


ALTER TABLE public.coches OWNER TO postgres;

--
-- Name: coches_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.coches_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.coches_id_seq OWNER TO postgres;

--
-- Name: coches_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.coches_id_seq OWNED BY public.coches.id;


--
-- Name: coches id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.coches ALTER COLUMN id SET DEFAULT nextval('public.coches_id_seq'::regclass);


--
-- Data for Name: coches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.coches (id, marca, modelo, serie, modificacion, plazas, capacidad_carga, intercooler) FROM stdin;
\.


--
-- Name: coches_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.coches_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

