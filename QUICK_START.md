# 🚀 LPC Website — Quick Start Guide

**TL;DR:** Your WordPress site is ready. Deploy in 3 steps.

---

## Step 1: Generate Security Keys (2 minutes)

Visit: https://api.wordpress.org/secret-key/1.1/salt/

Copy the entire output. You'll need it in Step 2.

---

## Step 2: Set Environment Variables in Railway (3 minutes)

1. Open your Railway project
2. Click the **wordpress** service
3. Go to **Variables** tab
4. Paste all the keys from Step 1 into:
   - `AUTH_KEY`
   - `SECURE_AUTH_KEY`
   - `LOGGED_IN_KEY`
   - `LOGGED_IN_SALT`
   - `NONCE_KEY`
   - `NONCE_SALT`
   - `AUTH_SALT`
   - `SECURE_AUTH_SALT`

5. Add these too:
   - `WP_ADMIN_PASSWORD` = Your strong password (e.g., `Ch@ngeMe2026!`)
   - `WP_ADMIN_EMAIL` = Your email

6. Click **Save**

---

## Step 3: Deploy (30 seconds)

Choose ONE:

### Via GitHub (Recommended)
```bash
cd lpc-railway
git init
git add .
git commit -m "LPC website deployment"
git remote add origin https://github.com/YOUR-USERNAME/lpc-railway.git
git push -u origin main
```

Then in Railway:
- Click **+ Add Service → GitHub Repo**
- Select your repo
- Click **Deploy**

### Via Railway CLI
```bash
npm install -g @railway/cli
railway login
cd lpc-railway
railway up
```

---

## ⏱️ Wait 2-5 minutes...

The container will:
1. Install WordPress
2. Create all pages
3. Set up menus
4. Populate branch data
5. Activate your theme

**You'll see:**
```
✅ LPC WordPress is ready!
🌐 Site: https://yoursite.up.railway.app
👤 Admin: lpcadmin
🔑 Password: [your password]
```

---

## 🎉 You're Live!

### Visit Your Site
```
https://yoursite.up.railway.app
```

### Login to Admin
```
https://yoursite.up.railway.app/wp-admin
Username: lpcadmin
Password: [what you set]
```

---

## 📸 Quick Setup (5 minutes)

1. **Upload logo**: Appearance → Customise → Site Identity
2. **Update contact info**: Appearance → Customise → LPC Theme Options
3. **Add content**: Posts, Pages, Branches, Sermons
4. **Invite team**: Share the wp-admin URL

Done! 🎊

---

## 🆘 Something Wrong?

1. Check **Railway dashboard → Logs**
2. Verify **MySQL is green** (connected)
3. Make sure **env vars are all set**
4. Wait **another 2-3 minutes** (setup takes time)

Still stuck? See **DEPLOYMENT_CHECKLIST.md** for troubleshooting.

---

That's it. Seriously. You're ready to deploy. 🚀
