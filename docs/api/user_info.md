# 📘 API Guide: UserInfo

This documentation is auto-generated for the **user_infos** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/user-infos` | Bearer |
| View One | `GET` | `/user-infos/{id}` | Bearer |
| Create | `POST` | `/user-infos` | Bearer |
| Update | `PUT` | `/user-infos/{id}` | Bearer |
| Delete | `DELETE` | `/user-infos/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `country_id` | *bigint* | Field from database |
| `city_id` | *bigint* | Field from database |
| `info` | *text* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
