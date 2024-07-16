
## Github configuration to push code 


### Step 1: navigate to xampp project

```
cd /c/xampp/htdocs/advance
```

## Step 2 clone repo

then we cloned the content of our repo
```
git clone https://github.com/astral-fate/UN-Women-Laravel-Scholarship.git

```

## Step 3 Copy files into target folder

then we copy the content of our files, excluding the repo folder

```
$source = "C:\xampp\htdocs\Day3"
$destination = "C:\xampp\htdocs\Day3\UN-Women-Laravel-Scholarship\Day 3\Assignment"
$exclude = "UN-Women-Laravel-Scholarship"

Get-ChildItem -Path $source -Exclude $exclude | ForEach-Object {
    Copy-Item -Path $_.FullName -Destination $destination -Recurse -Force
}

```
## Step 4 pushing the code into the repo

```
cd "Day 3\Assignment"
git add .
git commit -m "Added project files excluding the cloned repo to the Assignment directory"

git push origin main

```
