# 📘 API Guide: Posts

This documentation is auto-generated for the **posts** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/posts` | Bearer |
| View One | `GET` | `/posts/{id}` | Bearer |
| Create | `POST` | `/posts` | Bearer |
| Update | `PUT` | `/posts/{id}` | Bearer |
| Delete | `DELETE` | `/posts/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `description` | *text* | Field from database |
| `price_from` | *decimal* | Field from database |
| `price_to` | *decimal* | Field from database |
| `image` | *varchar* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
