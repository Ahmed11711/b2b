# 📘 API Guide: City

This documentation is auto-generated for the **cities** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/cities` | Bearer |
| View One | `GET` | `/cities/{id}` | Bearer |
| Create | `POST` | `/cities` | Bearer |
| Update | `PUT` | `/cities/{id}` | Bearer |
| Delete | `DELETE` | `/cities/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `country_id` | *bigint* | Field from database |
| `name_ar` | *varchar* | Field from database |
| `name_en` | *varchar* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
