# Contribution Report

**Project:** MUBS Student Management System
**Course:** Advanced Web Application Development (BUC3131), Academic Year 2026/2027
**Repository:** https://github.com/mpotaimaziriyah-coder/student-management-system

## Group members and tasks

| Member | Reg. number | Assigned tasks | Branch |
| Mpotaima Ziriyah | 24/U/0706 |  Q6 Documentation (README, screenshots, contribution report), Blade view layouts | feature/updated-seederfiles, documentation |
| Namuyaba Precious | 24/U/09419/PS | Q4: Application functionality (student CRUD, course CRUD, registration) | feature/q4-complete |
| Kirabo Isaac Musa | 24/U/24078/PS | Q3: Authentication, roles and permissions | feature/auth-roles |
| Manana James Joshua | 24/U/06641/EVE | Q1: Database design and relationships | feature/database-relationships |
| Mukaga Kevin Wanyama | 24/U/07162/PS | Q2: Seeders and sample data | feature/seeders |
| Nankanja Sarah | 24/U/22937 | Q5: Blade layouts, validation and links; contact page and index | feature/contact-page |

## Branching strategy

- `main`: stable, tested code
- `develop`: integration of all features
- `feature/*`: one branch per member, merged into `develop` through pull requests

## Pull requests

| # | Title | From | Into | Author | Status |
|---|-------|------|------|--------|--------|
| [#31,29,24,22,]| feature/updated-seederfiles | develop | Mpotaima Ziriyah | Merged |
| [#15,30,17] | feature/q4-complete | develop | Namuyaba Precious | Merged |
| [#25,7] | feature/auth-roles | develop | Kirabo Isaac Musa | Merged |
| [#11]  | feature/database-relationships | develop | Manana James Joshua | Merged |
| [#13] | feature/seeders | develop | Mukaga Kevin Wanyama | Merged |
| [#12,14,8,]  | feature/contact-page | develop | Nankanja Sarah | Merged |
| [#] | develop to main | develop | main | [name] | Merged |

## Commit summary

| Member | Commits |
|--------|---------|
| Mpotaima Ziriyah | 32 |
| Namuyaba Precious | 10 |
| Kirabo Isaac Musa | 4 |
| Manana James Joshua | 1 |
| Mukaga Kevin Wanyama | 3 |
| Nankanja Sarah | 18 |

## Testing before merge

`develop` was tested with `php artisan migrate:fresh --seed`. The administrator, lecturer and student logins and the main features (student and course management, registration, role-based dashboards) were checked before merging into `main`.