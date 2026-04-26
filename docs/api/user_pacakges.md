# 📘 API Guide: UserPacakges

This documentation is auto-generated for the **user_pacakges** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/user-pacakges` | Bearer |
| View One | `GET` | `/user-pacakges/{id}` | Bearer |
| Create | `POST` | `/user-pacakges` | Bearer |
| Update | `PUT` | `/user-pacakges/{id}` | Bearer |
| Delete | `DELETE` | `/user-pacakges/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `package_id` | *bigint* | Field from database |
| `starts_at` | *date* | Field from database |
| `ends_at` | *date* | Field from database |
| `active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
