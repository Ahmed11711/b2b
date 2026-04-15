# 📘 API Guide: Branch

This documentation is auto-generated for the **branches** table.

### 🚀 Endpoints
| Action | Method | Endpoint | Auth |
| :--- | :--- | :--- | :--- |
| List All | `GET` | `/branches` | Bearer |
| View One | `GET` | `/branches/{id}` | Bearer |
| Create | `POST` | `/branches` | Bearer |
| Update | `PUT` | `/branches/{id}` | Bearer |
| Delete | `DELETE` | `/branches/{id}` | Bearer |

### 📋 Database Schema
| Column | Type | Description |
| :--- | :--- | :--- |
| `id` | *bigint* | Field from database |
| `user_id` | *bigint* | Field from database |
| `title` | *varchar* | Field from database |
| `address` | *varchar* | Field from database |
| `mobile` | *varchar* | Field from database |
| `lat` | *decimal* | Field from database |
| `lng` | *decimal* | Field from database |
| `created_at` | *timestamp* | Field from database |
| `updated_at` | *timestamp* | Field from database |
