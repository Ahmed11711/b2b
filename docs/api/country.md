# 📘 API Guide: Country

This documentation is auto-generated for the **countries** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/countries` | Bearer |
| View One | `GET` | `/countries/{id}` | Bearer |
| Create | `POST` | `/countries` | Bearer |
| Update | `PUT` | `/countries/{id}` | Bearer |
| Delete | `DELETE` | `/countries/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `name_ar` | *varchar* | Field from database |
| `name_en` | *varchar* | Field from database |
| `code` | *varchar* | Field from database |
| `is_active` | *tinyint* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
