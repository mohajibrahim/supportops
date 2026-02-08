\# SupportOps Desk MVP (Laravel + Astro)



SupportOps Desk is a lightweight \*\*application support and incident management\*\* platform designed to mirror the responsibilities of an Application Support Specialist. It provides incident tracking, root cause analysis (RCA), a knowledge base, change requests, and SQL-driven reporting.



\## Why this MVP fits the CFPC role



\- \*\*Incident management\*\*: track issues, status, priority, and ownership.

\- \*\*Problem management \& RCA\*\*: capture root causes and prevention steps.

\- \*\*Knowledge base\*\*: author reusable troubleshooting articles.

\- \*\*Change management\*\*: document releases, approvals, and risk levels.

\- \*\*Reporting\*\*: run SQL-backed operational reports.



\## Tech Stack



\- \*\*Backend\*\*: Laravel (API)

\- \*\*Database\*\*: MySQL

\- \*\*Frontend\*\*: Astro (server-rendered pages)



\## Project Structure



```

supportops/

├── backend/                 # Laravel app files to copy into a fresh Laravel project

├── frontend/                # Astro app

├── api-endpoints.md         # API design reference

├── schema.sql               # MySQL schema (for reference)

└── pitch.md                 # Pitch copy for job application

```



\## Copy the MVP into your Ubuntu workspace



If you want this MVP in a dedicated folder (for example `~/supportops`), copy it out of this repo first:



```bash

mkdir -p ~/supportops

cp -R /path/to/supportops/\* ~/supportops/

```



Then continue the setup steps from inside `~/supportops`.



\## Local Setup (Ubuntu 22.04 + MySQL)



\### 1) Backend (Laravel)



Follow the instructions in \[`supportops/backend/README.md`](./backend/README.md) to scaffold a Laravel app and copy in the MVP files.



\### 2) Frontend (Astro)



```bash

cd supportops/frontend

npm install

npm run dev

```



Astro defaults to `http://localhost:4321`. The frontend expects the API at `http://127.0.0.1:8000/api`.



If your API runs elsewhere, set:



```bash

export PUBLIC\_API\_BASE\_URL="http://127.0.0.1:8000/api"

```



\## Running Astro on Windows 11



Yes — Astro runs well on Windows 11. Install Node.js (18+), then:



```powershell

cd supportops\\frontend

npm install

npm run dev

```



\## Next Enhancements



\- Add Laravel Sanctum authentication + role-based permissions.

\- Add audit logging for incident changes.

\- Add report export (CSV, PDF).

\- Add SLA timers and escalation rules.



