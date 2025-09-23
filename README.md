# A Group of Friends - Contributor Guide

Welcome! This guide explains how to set up the AGOF website locally and contribute updates. It's written for users with little to no coding experience.

## Forking the repo

1. At the top of this repo you will see a **Fork** button.
2. Click the **Fork** (In the top right corner) to create a copy of our repo under your own GitHub account.
3. Make sure the repo you are forking is `https://github.com/agofkinship/website`
4. Name your repo whatever you'd like and click **create**.

## Clone your fork locally

1. Install [Git](https://git-scm.com/downloads) if you don't have it already.
2. Open a terminal (Command Prompt on Windows, Terminal on Mac).
3. Run: 
    ```bash
    git clone https/github.com/YOUR_USERNAME/YOUR_REPO.git
    cd YOUR_REPO
    ```
    Replace `YOUR_USERNAME` and `YOUR_REPO` with your GitHub username and the repo name you chose.

## Installing PHP

The website uses PHP for reusable components and requires this to be on your system

1. Download [PHP](https://www.php.net/downloads.php).
2. Install it following the instructions on their site for your operating system.
3. To make sure its installed correctly;
    ```bash
    php -v
    ```
    if this doesn't work, try closing your terminal and opening it again
    **MAKE SURE TO NAVIGATE BACK TO YOUR FORK FOLDER USING THE ABOVE COMMANDS**

## Running a local PHP server

1. To check your current file path you can run `pwd`
2. Once you are inside your forked repo you can start your local server using; 
    ```bash
    php -S localhost:8000
    ```
    you can use any open ports, 8000 is usually unused.
3. Open your browser and put `localhost:8000` into your address bar
    * You should see the website running locally now.
    * PHP does not work when just opening a .php file, you are required to run the server.

## Fetching updates from the main repo

To stay up-to-date with the official website: 
1. Add the upstream repo to your fork (this only needs to be done once!!!): 
    ```bash
    git remote add upstream https://github.com/agofkinship/website.git
    ```
2. Fetch the latest changes: 
    ```bash
    git fetch upstream
    ```
3. Merge updates into your local main branch (the one you see on your computer):
    ```bash
    git checkout main
    git merge upstream/main
    ```

## Creating new features or updates
1. Whenever you'd like to make changes first make sure you are on your main local branch:
    ```bash
    git checkout main
    ```
    * this puts you on your local main branch
    ```bash
    git pull upstream main
    ```
    * this will make sure your main is up to date with the official repo
    ```bash
    git checkout -b <feature-branch-name>
    ```
    * this will open a new branch keeping bloat from your main branch

## Making changes

1. Edit `.php`, `.css`, or `.js` files as needed.
2. if creating new pages, remember to include components like the nav bar:
    ```php
    <?php include $_SERVER['DOCUMENT_ROOT'].'/components/nav.php'; ?>
    ```
    * Always use root-relative URLS for links and CSS/JS so they can work from any folder.

## Committing and pushing changes
```bash
git add .
git commit -m "add your message to display changes here"
git push origin feature-branch-name
```
Replace the `feature-branch-name` with the name of the branch you made.

## Opening a Pull Request (PR)
To see your work reflect, you will need to open a pull request to our main repo, to do this:

1. Go to your fork of our repo on GitHub.
2. Switch to your feature branch.
3. Click **Compare & Pull Request** at the top.
4. Select our repo as the target and make sure its on the `main` branch.
5. Submit your PR for review.

## Updating your branch after feedback
If changes are requested, make them locally on your feature branch and then commit and push them again:

    ```bash
    git add .
    git commit -m "requested changes"
    git push origin feature-branch-name
    ```

GitHub will automatically update your PR with your changes if pushed into the branch your PR was made on.

# TIPS FOR BEGINNERS
* Always branch off your `main` to start new work.
* Commit often
* Test your changes locally before pushing(ie; Make sure you can navigate locally first).
* Ask questions if you are unsure. We are here to help you, not hinder you.