# 📘 API Guide: Ads

This documentation is auto-generated for the **ads** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/ads` | Bearer |
| View One | `GET` | `/ads/{id}` | Bearer |
| Create | `POST` | `/ads` | Bearer |
| Update | `PUT` | `/ads/{id}` | Bearer |
| Delete | `DELETE` | `/ads/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `category_id` | *bigint* | Field from database |
| `status` | *enum* | Field from database |
| `title` | *varchar* | Field from database |
| `description` | *text* | Field from database |
| `image` | *varchar* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
