--
-- PostgreSQL database dump
--

-- Dumped from database version 15.13 (Debian 15.13-1.pgdg120+1)
-- Dumped by pg_dump version 16.4 (Ubuntu 16.4-1.pgdg22.04+1)

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
-- Name: admin_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.admin_type AS ENUM (
    'super',
    'data',
    'user'
);


ALTER TYPE public.admin_type OWNER TO postgres;

--
-- Name: appointment_cancelled_by; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.appointment_cancelled_by AS ENUM (
    'parent',
    'staff'
);


ALTER TYPE public.appointment_cancelled_by OWNER TO postgres;

--
-- Name: appointment_requested_by; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.appointment_requested_by AS ENUM (
    'staff',
    'parent'
);


ALTER TYPE public.appointment_requested_by OWNER TO postgres;

--
-- Name: appointment_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.appointment_status AS ENUM (
    'pending',
    'confirmed',
    'cancelled',
    'cancel_requested',
    'reschedule_requested',
    'rescheduled'
);


ALTER TYPE public.appointment_status OWNER TO postgres;

--
-- Name: child_gender; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.child_gender AS ENUM (
    'male',
    'female'
);


ALTER TYPE public.child_gender OWNER TO postgres;

--
-- Name: child_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.child_status AS ENUM (
    'good',
    'critical'
);


ALTER TYPE public.child_status OWNER TO postgres;

--
-- Name: maternal_health_status_enum; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.maternal_health_status_enum AS ENUM (
    'good',
    'critical',
    'needs_attention'
);


ALTER TYPE public.maternal_health_status_enum OWNER TO postgres;

--
-- Name: maternal_stage_enum; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.maternal_stage_enum AS ENUM (
    'first_trimester',
    'second_trimester',
    'third_trimester'
);


ALTER TYPE public.maternal_stage_enum OWNER TO postgres;

--
-- Name: maternal_status; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.maternal_status AS ENUM (
    'good',
    'bad'
);


ALTER TYPE public.maternal_status OWNER TO postgres;

--
-- Name: maternal_type_enum; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.maternal_type_enum AS ENUM (
    'antenatal',
    'postnatal'
);


ALTER TYPE public.maternal_type_enum OWNER TO postgres;

--
-- Name: parent_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.parent_type AS ENUM (
    'mother',
    'father',
    'guardian'
);


ALTER TYPE public.parent_type OWNER TO postgres;

--
-- Name: patient_type; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.patient_type AS ENUM (
    'maternal',
    'child'
);


ALTER TYPE public.patient_type OWNER TO postgres;

--
-- Name: user_role; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.user_role AS ENUM (
    'parent',
    'doctor',
    'phm',
    'admin'
);


ALTER TYPE public.user_role OWNER TO postgres;

--
-- Name: vaccination_status_enum; Type: TYPE; Schema: public; Owner: postgres
--

CREATE TYPE public.vaccination_status_enum AS ENUM (
    'pending',
    'completed',
    'overdue'
);


ALTER TYPE public.vaccination_status_enum OWNER TO postgres;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: admin_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_permissions (
    admin_id integer NOT NULL,
    permission_id integer NOT NULL,
    active boolean DEFAULT false,
    granted_by integer,
    granted_at timestamp with time zone DEFAULT now()
);


ALTER TABLE public.admin_permissions OWNER TO postgres;

--
-- Name: admin_type_permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_type_permissions (
    admin_type_id integer NOT NULL,
    permission_id integer NOT NULL,
    status boolean DEFAULT false
);


ALTER TABLE public.admin_type_permissions OWNER TO postgres;

--
-- Name: admin_types; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admin_types (
    id integer NOT NULL,
    type public.admin_type NOT NULL
);


ALTER TABLE public.admin_types OWNER TO postgres;

--
-- Name: admin_types_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.admin_types_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.admin_types_id_seq OWNER TO postgres;

--
-- Name: admin_types_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.admin_types_id_seq OWNED BY public.admin_types.id;


--
-- Name: admins; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.admins (
    id integer NOT NULL,
    admin_type_id integer
);


ALTER TABLE public.admins OWNER TO postgres;

--
-- Name: appointments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.appointments (
    id integer NOT NULL,
    patient_id integer,
    requested_by public.appointment_requested_by NOT NULL,
    datetime timestamp without time zone NOT NULL,
    location character varying(255) DEFAULT 'Not Allocated'::character varying,
    status public.appointment_status DEFAULT 'pending'::public.appointment_status,
    purpose character varying(255),
    notes json,
    reschedule_reason character varying(255),
    cancel_reason character varying(255),
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    phm_id integer,
    doctor_id integer
);


ALTER TABLE public.appointments OWNER TO postgres;

--
-- Name: appointments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.appointments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.appointments_id_seq OWNER TO postgres;

--
-- Name: appointments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.appointments_id_seq OWNED BY public.appointments.id;


--
-- Name: areas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.areas (
    id integer NOT NULL,
    code text NOT NULL
);


ALTER TABLE public.areas OWNER TO postgres;

--
-- Name: areas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.areas_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.areas_id_seq OWNER TO postgres;

--
-- Name: areas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.areas_id_seq OWNED BY public.areas.id;


--
-- Name: child_stats; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.child_stats (
    id integer NOT NULL,
    child_id integer,
    visit_date date NOT NULL,
    age_recorded_at character varying(20),
    height numeric(5,2),
    weight numeric(5,2),
    head_circum numeric(5,2),
    risk_flags character varying(255),
    notes json,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.child_stats OWNER TO postgres;

--
-- Name: child_stats_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.child_stats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.child_stats_id_seq OWNER TO postgres;

--
-- Name: child_stats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.child_stats_id_seq OWNED BY public.child_stats.id;


--
-- Name: children; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.children (
    id integer NOT NULL,
    parent_id integer,
    phm_id integer,
    name character varying(50) NOT NULL,
    date_of_birth date NOT NULL,
    gender public.child_gender NOT NULL,
    health_status public.child_status,
    gs_division character varying(50) DEFAULT ''::character varying NOT NULL,
    notes json,
    vaccination_status public.vaccination_status_enum DEFAULT 'pending'::public.vaccination_status_enum
);


ALTER TABLE public.children OWNER TO postgres;

--
-- Name: doctors; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.doctors (
    id integer NOT NULL
);


ALTER TABLE public.doctors OWNER TO postgres;

--
-- Name: maternal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.maternal (
    id integer NOT NULL,
    parent_id integer,
    pregnancy_date date,
    additional_info json,
    type public.maternal_type_enum DEFAULT 'antenatal'::public.maternal_type_enum,
    stage public.maternal_stage_enum DEFAULT 'first_trimester'::public.maternal_stage_enum,
    health_status public.maternal_health_status_enum DEFAULT 'good'::public.maternal_health_status_enum,
    phm_id integer
);


ALTER TABLE public.maternal OWNER TO postgres;

--
-- Name: maternal_stats; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.maternal_stats (
    id integer NOT NULL,
    maternal_id integer,
    visit_date date NOT NULL,
    trimester public.maternal_stage_enum NOT NULL,
    weight numeric(5,2),
    height numeric(5,2),
    bmi numeric(5,2),
    blood_pressure character varying(10),
    blood_sugar numeric(5,2),
    fundal_height numeric(5,2),
    notes text,
    created_at timestamp without time zone DEFAULT now(),
    health_status public.maternal_status DEFAULT 'good'::public.maternal_status
);


ALTER TABLE public.maternal_stats OWNER TO postgres;

--
-- Name: maternal_stats_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.maternal_stats_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.maternal_stats_id_seq OWNER TO postgres;

--
-- Name: maternal_stats_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.maternal_stats_id_seq OWNED BY public.maternal_stats.id;


--
-- Name: parents; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.parents (
    id integer NOT NULL,
    type public.parent_type NOT NULL,
    nic text NOT NULL,
    address text NOT NULL,
    area_id integer,
    gs_division character varying(100),
    age integer
);


ALTER TABLE public.parents OWNER TO postgres;

--
-- Name: patients; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.patients (
    id integer NOT NULL,
    type public.patient_type NOT NULL,
    created_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp without time zone DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE public.patients OWNER TO postgres;

--
-- Name: patients_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.patients_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.patients_id_seq OWNER TO postgres;

--
-- Name: patients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.patients_id_seq OWNED BY public.patients.id;


--
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    id integer NOT NULL,
    type text
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.permissions_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.permissions_id_seq OWNER TO postgres;

--
-- Name: permissions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;


--
-- Name: public_health_midwives; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.public_health_midwives (
    id integer NOT NULL,
    supervisor_id integer,
    area_id integer
);


ALTER TABLE public.public_health_midwives OWNER TO postgres;

--
-- Name: staffs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.staffs (
    id integer NOT NULL,
    nic text NOT NULL,
    license_no text
);


ALTER TABLE public.staffs OWNER TO postgres;

--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    name text NOT NULL,
    email text NOT NULL,
    password_hash text NOT NULL,
    role public.user_role NOT NULL,
    created_at timestamp with time zone DEFAULT now()
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: admin_types id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_types ALTER COLUMN id SET DEFAULT nextval('public.admin_types_id_seq'::regclass);


--
-- Name: appointments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.appointments ALTER COLUMN id SET DEFAULT nextval('public.appointments_id_seq'::regclass);


--
-- Name: areas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas ALTER COLUMN id SET DEFAULT nextval('public.areas_id_seq'::regclass);


--
-- Name: child_stats id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.child_stats ALTER COLUMN id SET DEFAULT nextval('public.child_stats_id_seq'::regclass);


--
-- Name: maternal_stats id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal_stats ALTER COLUMN id SET DEFAULT nextval('public.maternal_stats_id_seq'::regclass);


--
-- Name: patients id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patients ALTER COLUMN id SET DEFAULT nextval('public.patients_id_seq'::regclass);


--
-- Name: permissions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: admin_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin_permissions (admin_id, permission_id, active, granted_by, granted_at) FROM stdin;
\.


--
-- Data for Name: admin_type_permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin_type_permissions (admin_type_id, permission_id, status) FROM stdin;
\.


--
-- Data for Name: admin_types; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admin_types (id, type) FROM stdin;
1	super
2	data
3	user
\.


--
-- Data for Name: admins; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.admins (id, admin_type_id) FROM stdin;
4	1
\.


--
-- Data for Name: appointments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.appointments (id, patient_id, requested_by, datetime, location, status, purpose, notes, reschedule_reason, cancel_reason, created_at, updated_at, phm_id, doctor_id) FROM stdin;
3	2	parent	2025-11-19 10:00:00	Not Allocated	cancel_requested	Simple	[]	g	ff	2025-10-19 14:38:31.783093	2025-10-19 14:38:31.783093	1	\N
1	1	parent	2025-10-23 11:00:00	HealthCare Center	cancel_requested	Routine Checkup	[]	hhh	ww	2025-10-19 18:39:19.446258	2025-10-19 18:39:19.446258	1	\N
2	2	staff	2025-10-31 09:00:00	HealthCare Center	reschedule_requested	Eye Examination	[]	hh	ggf	2025-10-19 18:39:19.446258	2025-10-19 18:39:19.446258	1	2
\.


--
-- Data for Name: areas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.areas (id, code) FROM stdin;
1	Paraduwa
2	Mawawwa
3	Kiyaduwa
4	Galabadahena
5	Poraba
6	Iluppalla
7	Ibulgoda
8	Maraba
9	Hulandawa
10	Peddapitiya
\.


--
-- Data for Name: child_stats; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.child_stats (id, child_id, visit_date, age_recorded_at, height, weight, head_circum, risk_flags, notes, created_at, updated_at) FROM stdin;
\.


--
-- Data for Name: children; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.children (id, parent_id, phm_id, name, date_of_birth, gender, health_status, gs_division, notes, vaccination_status) FROM stdin;
5	\N	1	Jane Jam	2025-10-14	male	\N	morutuwa	\N	pending
2	3	1	Alex Hales	2025-05-12	female	good	borella	\N	pending
7	\N	1	ddz	2026-12-02	male	\N	borella	\N	pending
\.


--
-- Data for Name: doctors; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.doctors (id) FROM stdin;
2
\.


--
-- Data for Name: maternal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.maternal (id, parent_id, pregnancy_date, additional_info, type, stage, health_status, phm_id) FROM stdin;
1	3	2024-12-01	{"last_menstrual_period": "2024-11-15", "expected_delivery_date": "2025-08-22"}	antenatal	second_trimester	good	1
\.


--
-- Data for Name: maternal_stats; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.maternal_stats (id, maternal_id, visit_date, trimester, weight, height, bmi, blood_pressure, blood_sugar, fundal_height, notes, created_at, health_status) FROM stdin;
1	1	2024-01-15	first_trimester	60.50	165.00	22.20	120/80	90.50	12.00	[{"note": "Initial visit"}]	2025-10-21 16:07:21.426787	good
2	1	2024-03-15	second_trimester	65.00	165.00	23.90	118/78	95.00	20.00	[{"note": "Routine follow-up"}]	2025-10-21 16:07:21.426787	good
3	1	2024-06-15	third_trimester	70.00	165.00	25.70	115/75	100.00	30.00	[{"note": "Pre-delivery assessment"}]	2025-10-21 16:07:21.426787	good
4	1	2025-10-16	second_trimester	56.00	118.00	5.00	120	100.00	50.00	[{"note":"gytbuh"}]	2025-10-22 07:23:28.590199	good
\.


--
-- Data for Name: parents; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.parents (id, type, nic, address, area_id, gs_division, age) FROM stdin;
3	mother	200315000887	Jaffna	5	\N	31
5	father	200315300887	Jaffna	5	\N	\N
\.


--
-- Data for Name: patients; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.patients (id, type, created_at, updated_at) FROM stdin;
1	maternal	2025-10-19 00:41:04.046677	2025-10-19 00:41:04.046677
2	child	2025-10-19 00:41:04.046677	2025-10-19 00:41:04.046677
3	child	2025-10-19 00:41:04.046677	2025-10-19 00:41:04.046677
4	child	2025-10-21 16:50:12.490201	2025-10-21 16:50:12.490201
5	child	2025-10-21 17:00:57.400763	2025-10-21 17:00:57.400763
7	child	2025-10-22 09:16:13.916391	2025-10-22 09:16:13.916391
\.


--
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (id, type) FROM stdin;
\.


--
-- Data for Name: public_health_midwives; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.public_health_midwives (id, supervisor_id, area_id) FROM stdin;
1	\N	1
\.


--
-- Data for Name: staffs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.staffs (id, nic, license_no) FROM stdin;
1	198510212346	PHM-00543
2	199070134567	REG-DR-2025-0123
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, password_hash, role, created_at) FROM stdin;
2	Sarah	sarah@gmail.com	$2y$10$..NMr8N3Q2dbPEmN3eRnV.yGESO0WfWtJX2o4zPSvffC0.vbPF8iu	doctor	2025-09-11 16:20:41.125904+00
3	Kajenthirakumar Keeththigan	keeththi2003@gmail.com	$2y$10$bpTnl38F9DvSkMR.UPAase4s0HeI7CTmvobreFWi/GrYY4cahM7Ba	parent	2025-09-11 16:23:44.762601+00
1	Nirmal	nirmal@gmail.com	$2y$10$..NMr8N3Q2dbPEmN3eRnV.yGESO0WfWtJX2o4zPSvffC0.vbPF8iu	phm	2025-09-11 16:20:41.125904+00
4	Mani	manimehalan400@gmail.com	$2y$10$..NMr8N3Q2dbPEmN3eRnV.yGESO0WfWtJX2o4zPSvffC0.vbPF8iu	admin	2025-09-13 15:15:39.071788+00
5	Kajenthirakumar Keeththigan	keetht@gmail.com	$2y$10$oV0YucqD2CFUoyEsAVzGbes1BxoA8eJuFOAeQo6s4FYMySUjD/kcO	parent	2025-10-22 08:58:49.008112+00
\.


--
-- Name: admin_types_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.admin_types_id_seq', 3, true);


--
-- Name: appointments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.appointments_id_seq', 11, true);


--
-- Name: areas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.areas_id_seq', 10, true);


--
-- Name: child_stats_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.child_stats_id_seq', 2, true);


--
-- Name: maternal_stats_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.maternal_stats_id_seq', 4, true);


--
-- Name: patients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.patients_id_seq', 7, true);


--
-- Name: permissions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- Name: admin_permissions admin_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_permissions
    ADD CONSTRAINT admin_permissions_pkey PRIMARY KEY (admin_id, permission_id);


--
-- Name: admin_type_permissions admin_type_permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_type_permissions
    ADD CONSTRAINT admin_type_permissions_pkey PRIMARY KEY (admin_type_id, permission_id);


--
-- Name: admin_types admin_types_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_types
    ADD CONSTRAINT admin_types_pkey PRIMARY KEY (id);


--
-- Name: admins admins_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_pkey PRIMARY KEY (id);


--
-- Name: appointments appointments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_pkey PRIMARY KEY (id);


--
-- Name: areas areas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.areas
    ADD CONSTRAINT areas_pkey PRIMARY KEY (id);


--
-- Name: child_stats child_stats_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.child_stats
    ADD CONSTRAINT child_stats_pkey PRIMARY KEY (id);


--
-- Name: children children_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.children
    ADD CONSTRAINT children_pkey PRIMARY KEY (id);


--
-- Name: doctors doctors_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctors
    ADD CONSTRAINT doctors_pkey PRIMARY KEY (id);


--
-- Name: maternal maternal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal
    ADD CONSTRAINT maternal_pkey PRIMARY KEY (id);


--
-- Name: maternal_stats maternal_stats_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal_stats
    ADD CONSTRAINT maternal_stats_pkey PRIMARY KEY (id);


--
-- Name: parents parents_nic_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parents
    ADD CONSTRAINT parents_nic_key UNIQUE (nic);


--
-- Name: parents parents_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parents
    ADD CONSTRAINT parents_pkey PRIMARY KEY (id);


--
-- Name: patients patients_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patients
    ADD CONSTRAINT patients_pkey PRIMARY KEY (id);


--
-- Name: permissions permissions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);


--
-- Name: public_health_midwives public_health_midwives_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.public_health_midwives
    ADD CONSTRAINT public_health_midwives_pkey PRIMARY KEY (id);


--
-- Name: staffs staffs_license_no_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_license_no_key UNIQUE (license_no);


--
-- Name: staffs staffs_nic_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_nic_key UNIQUE (nic);


--
-- Name: staffs staffs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_pkey PRIMARY KEY (id);


--
-- Name: users users_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_key UNIQUE (email);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: admin_permissions admin_permissions_admin_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_permissions
    ADD CONSTRAINT admin_permissions_admin_id_fkey FOREIGN KEY (admin_id) REFERENCES public.admins(id);


--
-- Name: admin_permissions admin_permissions_granted_by_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_permissions
    ADD CONSTRAINT admin_permissions_granted_by_fkey FOREIGN KEY (granted_by) REFERENCES public.admins(id);


--
-- Name: admin_permissions admin_permissions_permission_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_permissions
    ADD CONSTRAINT admin_permissions_permission_id_fkey FOREIGN KEY (permission_id) REFERENCES public.permissions(id);


--
-- Name: admin_type_permissions admin_type_permissions_admin_type_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_type_permissions
    ADD CONSTRAINT admin_type_permissions_admin_type_id_fkey FOREIGN KEY (admin_type_id) REFERENCES public.admin_types(id);


--
-- Name: admin_type_permissions admin_type_permissions_permission_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admin_type_permissions
    ADD CONSTRAINT admin_type_permissions_permission_id_fkey FOREIGN KEY (permission_id) REFERENCES public.permissions(id);


--
-- Name: admins admins_admin_type_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_admin_type_id_fkey FOREIGN KEY (admin_type_id) REFERENCES public.admin_types(id);


--
-- Name: admins admins_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.admins
    ADD CONSTRAINT admins_id_fkey FOREIGN KEY (id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: appointments appointments_patient_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT appointments_patient_id_fkey FOREIGN KEY (patient_id) REFERENCES public.patients(id) ON DELETE SET NULL;


--
-- Name: child_stats child_stats_child_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.child_stats
    ADD CONSTRAINT child_stats_child_id_fkey FOREIGN KEY (child_id) REFERENCES public.children(id) ON DELETE CASCADE;


--
-- Name: children children_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.children
    ADD CONSTRAINT children_id_fkey FOREIGN KEY (id) REFERENCES public.patients(id) ON DELETE CASCADE;


--
-- Name: children children_parent_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.children
    ADD CONSTRAINT children_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES public.parents(id) ON DELETE CASCADE;


--
-- Name: children children_phm_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.children
    ADD CONSTRAINT children_phm_id_fkey FOREIGN KEY (phm_id) REFERENCES public.public_health_midwives(id) ON DELETE SET NULL;


--
-- Name: doctors doctors_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.doctors
    ADD CONSTRAINT doctors_id_fkey FOREIGN KEY (id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: appointments fk_name; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT fk_name FOREIGN KEY (phm_id) REFERENCES public.public_health_midwives(id);


--
-- Name: maternal fk_name; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal
    ADD CONSTRAINT fk_name FOREIGN KEY (phm_id) REFERENCES public.public_health_midwives(id);


--
-- Name: appointments fk_name2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.appointments
    ADD CONSTRAINT fk_name2 FOREIGN KEY (doctor_id) REFERENCES public.doctors(id);


--
-- Name: maternal maternal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal
    ADD CONSTRAINT maternal_id_fkey FOREIGN KEY (id) REFERENCES public.patients(id) ON DELETE CASCADE;


--
-- Name: maternal maternal_parent_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal
    ADD CONSTRAINT maternal_parent_id_fkey FOREIGN KEY (parent_id) REFERENCES public.parents(id) ON DELETE SET NULL;


--
-- Name: maternal_stats maternal_stats_maternal_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.maternal_stats
    ADD CONSTRAINT maternal_stats_maternal_id_fkey FOREIGN KEY (maternal_id) REFERENCES public.maternal(id) ON DELETE CASCADE;


--
-- Name: parents parents_area_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parents
    ADD CONSTRAINT parents_area_id_fkey FOREIGN KEY (area_id) REFERENCES public.areas(id) ON DELETE CASCADE;


--
-- Name: parents parents_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.parents
    ADD CONSTRAINT parents_id_fkey FOREIGN KEY (id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: public_health_midwives public_health_midwives_area_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.public_health_midwives
    ADD CONSTRAINT public_health_midwives_area_id_fkey FOREIGN KEY (area_id) REFERENCES public.areas(id) ON DELETE CASCADE;


--
-- Name: public_health_midwives public_health_midwives_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.public_health_midwives
    ADD CONSTRAINT public_health_midwives_id_fkey FOREIGN KEY (id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: public_health_midwives public_health_midwives_supervisor_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.public_health_midwives
    ADD CONSTRAINT public_health_midwives_supervisor_id_fkey FOREIGN KEY (supervisor_id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- Name: staffs staffs_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.staffs
    ADD CONSTRAINT staffs_id_fkey FOREIGN KEY (id) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- PostgreSQL database dump complete
--

