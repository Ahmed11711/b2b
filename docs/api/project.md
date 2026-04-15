# 📘 API Guide: Project

This documentation is auto-generated for the **projects** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/api/v1/provider/my-projects` | Bearer |
| View One | `GET` | `/api/v1/provider/my-projects/{id}` | Bearer |
| Create | `POST` | `/api/v1/provider/my-projects` | Bearer |
| Update | `PUT` | `/api/v1/provider/my-projects/{id}` | Bearer |
| Delete | `DELETE` | `/api/v1/provider/my-projects/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `project_date` | *date* | Field from database |
| `image` | *varchar* | Field from database |
| `description` | *text* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
