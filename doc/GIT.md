### Clone (with Submodule)
```

```






### Save Credentials
```
git config --global credential.helper store
```


### Create Tag
```
git tag 0.1
git push --tags
```

### Delete Tag
```
git tag -d 0.1
```


### Delete History
```
git checkout --orphan latest_branch
git add -A
git commit -am "."
git branch -D master
git branch -m master
git push -f origin master
```

