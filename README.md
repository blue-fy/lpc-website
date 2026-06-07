# London Pentecostal Church — Railway Deployment Guide

## What this package contains

```
lpc-railway/
├── Dockerfile              # PHP 8.2 + Apache + WP-CLI
├── railway.toml            # Railway project config
├── wp-config-railway.php   # WordPress config (reads env vars)
├── entrypoint.sh           # Auto-installs WordPress + LPC theme
├── .htaccess               # WordPress permalinks + security headers
├── lpc-theme/              # The full LPC WordPress theme
└── README.md               # This file
```

---

## Step-by-step deployment

### Step 1 — Create a Railway account
Go to https://railway.app and sign up (free tier available).
Connect your GitHub account when prompted.

---

### Step 2 — Create a new project

1. Click **New Project**
2. Choose **Deploy from GitHub repo** OR **Empty project** (we'll use empty)
3. Name it: `lpc-website-preview`

---

### Step 3 — Add a MySQL database

1. Inside your project, click **+ Add Service**
2. Choose **Database → MySQL**
3. Railway will auto-create it and set environment variables:
   - `MYSQL_HOST`, `MYSQL_PORT`, `MYSQL_DATABASE`, `MYSQL_USER`, `MYSQL_PASSWORD`
4. Wait for it to turn green (ready)

---

### Step 4 — Deploy the WordPress container

**Option A — Via GitHub (recommended):**
1. Push this entire `lpc-railway` folder to a GitHub repo
2. In Railway, click **+ Add Service → GitHub Repo**
3. Select your repo — Railway detects the Dockerfile automatically
4. Click **Deploy**

**Option B — Via Railway CLI:**
```bash
npm install -g @railway/cli
railway login
cd lpc-railway
railway up
```

---

### Step 5 — Set environment variables

In Railway, go to your WordPress service → **Variables** tab, and add:

| Variable | Value | Notes |
|---|---|---|
| `WP_ADMIN_PASSWORD` | `YourStrongPassword123!` | Change this! |
| `WP_ADMIN_EMAIL` | `admin@londonpentecostalchurch.org` | Your email |
| `WP_SITE_TITLE` | `London Pentecostal Church` | Site name |
| `WP_DEBUG` | `false` | Set true only for debugging |

The database variables (`MYSQL_HOST`, `MYSQL_DATABASE`, etc.) are set
**automatically** by Railway when you add the MySQL plugin — no action needed.

---

### Step 6 — Get your public URL

1. In Railway, go to your WordPress service → **Settings → Networking**
2. Click **Generate Domain**
3. You'll get a URL like `lpc-website-preview.up.railway.app`
4. This URL is automatically injected as `RAILWAY_PUBLIC_DOMAIN`

---

### Step 7 — Wait for auto-setup

The entrypoint script automatically:
- ✅ Waits for MySQL to be ready
- ✅ Installs WordPress
- ✅ Activates the LPC theme
- ✅ Creates all pages (Home, About, Ministries, Sermons, Branches, Contact)
- ✅ Sets up navigation menus
- ✅ Populates all 5 branches with logos and service times
- ✅ Sets homepage and permalink structure
- ✅ Adds a sample announcement post

Watch the deploy logs — when you see `✅ LPC WordPress is ready!` you're done.

---

### Step 8 — Log in to WordPress admin

Visit: `https://YOUR-DOMAIN.up.railway.app/wp-admin`
- Username: `lpcadmin`
- Password: whatever you set in `WP_ADMIN_PASSWORD`

---

## After deployment — what to do in wp-admin

### Upload the branch logos
1. Go to **Branches** in the left menu
2. Edit each branch
3. In the **Branch Details** box, paste the Logo URL from **Media → Library**
   (upload `BPC_transparent.png`, `CPC_transparent.png` etc. first)

### Upload the LPC main logo
1. **Appearance → Customise → Site Identity**
2. Upload `LPC_transparent.png` as your site logo

### Set service times / contact info
1. **Appearance → Customise → LPC Theme Options**
2. Update service times, address, email, YouTube channel URL, social links

### Connect YouTube sermon feed
1. Install **Feeds for YouTube** plugin (free, by Smash Balloon)
2. Go to **YouTube Feed → Add New** → connect your channel
3. The homepage will auto-display your latest 3 videos

### Add more announcements/news
1. **Posts → Add New**
2. Assign a category (Youth, Community, Featured, etc.)
3. Publish — appears on homepage automatically

---

## Sharing with the church team

Once deployed, share the Railway URL with the team:
```
https://lpc-website-preview.up.railway.app
```

For the admin review:
```
https://lpc-website-preview.up.railway.app/wp-admin
Username: lpcadmin
Password: [what you set]
```

---

## Railway free tier limits

| Resource | Free Tier | Notes |
|---|---|---|
| RAM | 512MB | Enough for WordPress preview |
| CPU | Shared | Fine for low traffic |
| Bandwidth | 100GB/month | More than enough for church preview |
| Sleep | Never (hobby plan $5/mo) | Free tier sleeps after inactivity |

For a permanent preview link, upgrade to Railway's **Hobby plan ($5/month)** — 
the site will stay awake. For production, migrate to your actual hosting.

---

## When ready for production (londonpentecostalchurch.org)

1. Export database: **Tools → Export** in wp-admin
2. Export theme: download `lpc-theme` folder
3. Upload theme ZIP to production WP: **Appearance → Themes → Upload**
4. Import database to production MySQL
5. Update site URL in **Settings → General**

---

## Support

Theme files: `lpc-theme/` folder
Config: `wp-config-railway.php`
Questions: contact your web team

© 2026 London Pentecostal Church
