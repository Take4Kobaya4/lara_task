gish(){
    # 全てステージにのせる
    git add -A;
    #コミット対象のファイルを確認
    git status;
    #コミットしても良いか確認
    read -p "Commit with this content. OK?(y/n): " yesno
    case "$yesno" in

    # yes
    [yY]*) read -p "Input Commit Message: " msg;
    #コミット
    git commit -m "$msg";
    CURRENT_BRANCH=`git rev-parse --abbrev-ref HEAD`;
    #プッシュ
    git push origin ${CURRENT_BRANCH};;

    #no
    *) echo "Quit";
    esac
}