--
-- PostgreSQL database dump
--

-- Dumped from database version 16.3
-- Dumped by pg_dump version 16.3

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
-- Name: articles; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articles (
    id integer NOT NULL,
    title character varying(50) NOT NULL,
    date_publication timestamp without time zone,
    content text NOT NULL,
    author_id integer NOT NULL,
    category_id integer NOT NULL,
    is_deleted boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone
);


ALTER TABLE public.articles OWNER TO postgres;

--
-- Name: articles_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.articles_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.articles_id_seq OWNER TO postgres;

--
-- Name: articles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.articles_id_seq OWNED BY public.articles.id;


--
-- Name: authors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.authors (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    biography character varying(255) DEFAULT NULL::character varying,
    email character varying(100) NOT NULL,
    is_deleted boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone
);


ALTER TABLE public.authors OWNER TO postgres;

--
-- Name: author_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.author_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.author_id_seq OWNER TO postgres;

--
-- Name: author_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.author_id_seq OWNED BY public.authors.id;


--
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    name character varying(50) NOT NULL,
    description character varying(100) NOT NULL,
    is_deleted boolean DEFAULT false NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL,
    updated_at timestamp without time zone
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.categories_id_seq OWNER TO postgres;

--
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- Name: articles id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles ALTER COLUMN id SET DEFAULT nextval('public.articles_id_seq'::regclass);


--
-- Name: authors id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.authors ALTER COLUMN id SET DEFAULT nextval('public.author_id_seq'::regclass);


--
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- Data for Name: articles; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.articles (id, title, date_publication, content, author_id, category_id, is_deleted, created_at, updated_at) FROM stdin;
1	asd	2024-05-16 00:00:00	asd	1	1	t	2024-05-16 17:31:25.982097	\N
2	aeae	2024-05-16 00:00:00	aeaeae	1	1	t	2024-05-16 18:14:57.652827	\N
4	prueba	2024-05-18 00:00:00	&lt;p&gt;asddassdaasd&lt;em&gt;asdasdasd&lt;/em&gt;&lt;strong&gt;&lt;em&gt;sdasdadsasdasd&lt;u&gt;sdasdasdasdsad eee&lt;/u&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;	1	1	f	2024-05-18 07:15:25.745181	\N
3	Carlos pelea con el profesor Arroyo	2024-05-16 00:00:00	&lt;p&gt;Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi omnis illum nobis, harum qui non laborum quo quod vel tempora sequi. Consequatur architecto laudantium, dolores odio numquam quos reprehenderit. Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus animi omnis illum nobis, harum qui non laborum quo quod vel tempora sequi. Consequatur architecto laudantium, dolores odio numquam quos reprehenderit. asdadasdas&lt;/p&gt;	1	1	f	2024-05-16 19:37:22.731888	\N
\.


--
-- Data for Name: authors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.authors (id, name, biography, email, is_deleted, created_at, updated_at) FROM stdin;
1	Gustavo Gil	Peruano	gilgustavoj@gmail.com	f	2024-05-15 16:53:46.112765	\N
3	asdasd	asd	asdasd@gmail.com	t	2024-05-15 18:05:36.031924	\N
2	asd	asd	asd@gmail.com	t	2024-05-15 18:04:30.780466	\N
4	Autor Dos	asd	asdasd@gmail.com	t	2024-05-18 07:55:34.016543	\N
5	asd	\N	asd@gmail.com	t	2024-05-18 19:42:39.262065	\N
6	Luis Rojas	\N	couso123@gmail.com	f	2024-05-18 19:55:36.844731	\N
\.


--
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, name, description, is_deleted, created_at, updated_at) FROM stdin;
2	ae	ae	t	2024-05-15 20:23:08.224849	\N
3	Ciencia	ciencias	f	2024-05-18 07:55:20.444803	\N
1	Tecnologia	Datos Tecnologicos	f	2024-05-15 19:47:50.154501	\N
\.


--
-- Name: articles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.articles_id_seq', 4, true);


--
-- Name: author_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.author_id_seq', 6, true);


--
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 3, true);


--
-- Name: articles articles_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT articles_pkey PRIMARY KEY (id);


--
-- Name: authors author_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.authors
    ADD CONSTRAINT author_pkey PRIMARY KEY (id);


--
-- Name: categories categories_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT categories_pkey PRIMARY KEY (id);


--
-- Name: articles fk_author_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT fk_author_id FOREIGN KEY (author_id) REFERENCES public.authors(id);


--
-- Name: articles fk_category_id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articles
    ADD CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES public.categories(id);


--
-- PostgreSQL database dump complete
--

