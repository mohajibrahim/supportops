# SupportOps Desk API Endpoints

Base URL: `http://127.0.0.1:8000/api`

## Health

- `GET /health` → `{ "status": "ok" }`

## Incidents

- `GET /incidents`
- `POST /incidents`
- `GET /incidents/{incident}`
- `PUT /incidents/{incident}`
- `DELETE /incidents/{incident}`

## Root Cause Analysis

- `GET /incidents/{incident}/root-cause-analysis`
- `POST /incidents/{incident}/root-cause-analysis`

## Knowledge Base

- `GET /knowledge-base`
- `POST /knowledge-base`
- `GET /knowledge-base/{knowledge_base_article}`
- `PUT /knowledge-base/{knowledge_base_article}`
- `DELETE /knowledge-base/{knowledge_base_article}`

## Change Requests

- `GET /change-requests`
- `POST /change-requests`
- `GET /change-requests/{change_request}`
- `PUT /change-requests/{change_request}`
- `DELETE /change-requests/{change_request}`

## Reports

- `GET /reports`
- `POST /reports`
- `GET /reports/{report}`
- `POST /reports/{report}/run` (executes saved SQL query)
