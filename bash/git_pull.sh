
girk(){
    # developブランチに切り替え
    git checkout develop;
    # developブランチをプル
    git pull origin develop;

    read -p "Input feature branch name: " BRANCH
    # ブランチの新規作成
    git checkout -b ${BRANCH}
}

