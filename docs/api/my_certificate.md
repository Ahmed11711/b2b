# 📘 API Guide: MyCertificate

This documentation is auto-generated for the **my_certificates** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/my-certificates` | Bearer |
| View One | `GET` | `/my-certificates/{id}` | Bearer |
| Create | `POST` | `/my-certificates` | Bearer |
| Update | `PUT` | `/my-certificates/{id}` | Bearer |
| Delete | `DELETE` | `/my-certificates/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `issue_date` | *date* | Field from database |
| `image` | *varchar* | Field from database |
| `description` | *text* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
