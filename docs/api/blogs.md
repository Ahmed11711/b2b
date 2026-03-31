# 📘 API Guide: blogs

This documentation is auto-generated for the **blogs** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/api/blogs` | Bearer |
| View One | `GET` | `/api/blogs/{id}` | Bearer |
| Create | `POST` | `/api/blogs` | Bearer |
| Update | `PUT` | `/api/blogs/{id}` | Bearer |
| Delete | `DELETE` | `/api/blogs/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `title_ar` | *varchar* | Field from database |
| `desc` | *text* | Field from database |
| `active` | *tinyint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `image` | *varchar* | Field from database |
| `status` | *enum* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
