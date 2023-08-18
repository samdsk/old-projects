const Discord = require("discord.js");
module.exports = {
    name: 'boss',
    description: 'Bot Commands Help',
    execute(bot, message, args, VARSET) {
      let helpEmbed = new Discord.RichEmbed()
      .setAuthor(bot.user.username, bot.user.avatarURL)
      .setTitle("What the heck you want "+message.author.username+"?")
      .setColor("#8941f4")
      .addField("Want to invite me?", "_invite")
      .addField("Want to move people","_move [@someone] [channel] (channel name is case-sensitive)")
      .addField("Want to change nickname", "_nickname [new nickname]")
      .addField("Want to contact Maganer?","_dm-admin [message]")
      .addField("Want to contact HR","_dm-mod [message]")
      .addField("Moderation commands")
      .addField("Report an user", "_report [@someone] [reason]")
      .addField("Warn an user","_warn [@someone] [reason]")
      .addField("Prison command = Disabled")
      .addField("Send to prison:","_prison[ @someone] [time[s]] (number!)")
      .addField("Release all:","_prison [release] (prisoners will be released to default voice channel!)")
      .addField("Break:","_prison [break] [@someone] (mentioned user will be released from prison and moved to default channel)")
      .addField("Abuse:","If someone abuse prison command without any reason please report the user to the server admin")
      .setFooter("Work hard or you'll be next!"+ message.guild.name, bot.user.avatarURL)
      .setTimestamp()
      .setThumbnail(bot.user.avatarURL);

      message.channel.send(helpEmbed);

      helpEmbed = new Discord.RichEmbed()
      .setAuthor(bot.user.username, bot.user.avatarURL)
      .setTitle("page 2")
      .setColor("#8941f4")
      .addField("Admin Commands")
      .addField("Reaction Roles setup:","_rr [Message ID] [@Role]")
      .addField("Setup:")
      .addField("--Set Move Role","_setup [moverole] [@role]")
      .addField("--Set Bot Command Channel","_setup [bot-cmd] [#text-channel]")
      .addField("--Set prefix","_setup [prefix-setup] [special charactor]")
      .addField("--Set Admin Role","_setup [adminrole] [@role]")
      .addField("--Set Mod Role","_setup [modrole] [@role]")
      .addField("--Set Prison Channel","_setup [prison] [channel]")
      .setFooter("Work hard or you'll be next!"+ message.guild.name, bot.user.avatarURL)
      .setTimestamp()
      .setThumbnail(bot.user.avatarURL);

      message.channel.send(helpEmbed);

      //console.log(message)
    },
};
